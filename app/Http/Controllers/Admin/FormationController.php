<?php

namespace App\Http\Controllers\Admin;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormationController extends Controller
{
    public function index(Request $request)
    {
        // la liste des formations
        $formations = new Formation;

        if ($request->has('search') && $request->search) {
            $formations = $formations->where('name', 'LIKE', "%{$request->search}%");
        }

        $request->flash();

        // dd($formations);

        $formations = $formations->paginate(3);

        return view('admin.formation.index', [
            'formations' => $formations,
        ]);
    }

    public function create()
    {
        return view('admin.formation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'link' => 'nullable|url',
            'description' => 'nullable',
        ]);
        
        $formation = Formation::create([
            'name' => $request->name,
            'date' => $request->date,
            'description' => $request->description,
            'link' => $request->link,
        ]);

        if (!$formation) {
            dd('erreur insertion');
        }

        return redirect()->route('formation.index');
        // dd('no error');
    }

    public function edit($id)
    {
        $formation = Formation::findOrFail($id);

        return view('admin.formation.edit', [
            'formation' => $formation,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'link' => 'nullable|url',
            'description' => 'nullable',
        ]);

        $formation = Formation::findOrFail($id);

        if ($request->has('name') && $request->name) {
            $formation->name = $request->name;
        }

        if ($request->has('date') && $request->date) {
            $formation->date = $request->date;
        }

        if ($request->has('description') && $request->description) {
            $formation->description = $request->description;
        }

        if ($request->has('link')) {
            $formation->link = $request->link;
        }

        if ($formation->save()) {
            return redirect()->route('formation.index');
        }

        return back();
    }

    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);

        if (!$formation->delete()) {
            dd('erreur suppression');
        }

        return back();
    }
}
