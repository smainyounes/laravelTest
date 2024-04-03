<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FormationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contactez', [HomeController::class, 'contact'])->name('contact');

Route::prefix('admin')->group(function () {
    Route::get('/', function ()
    {
        return view('admin.dashboard');
    });

    Route::prefix('formation')->group(function () {
        Route::get('/', [FormationController::class, 'index'])->name('formation.index');
        Route::get('/create', [FormationController::class, 'create'])->name('formation.create');
        Route::post('/store', [FormationController::class, 'store'])->name('formation.store');
        Route::get('/edit/{id}', [FormationController::class, 'edit'])->name('formation.edit');
        Route::post('/update/{id}', [FormationController::class, 'update'])->name('formation.update');
        Route::post('/destroy/{id}', [FormationController::class, 'destroy'])->name('formation.destroy');
        
    });


    
});