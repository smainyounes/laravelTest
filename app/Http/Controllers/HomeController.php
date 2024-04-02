<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.welcome', [
            'name' => 'james',
        ]);
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function admin()
    {
        return 'we r in admin panel';
    }
}
