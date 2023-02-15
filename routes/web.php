<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    sleep(1);
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/themes', function() {
    return Inertia::render('Themes', [
        'themes' => ['theme 1', 'theme 2', 'theme 3'],
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::get('/users', function() {
    sleep(1);
    return Inertia::render('Users', [
        'users' => ['Chris', 'Jon', 'Kelly', 'Rushabh']
    ]);
});
Route::get('/settings', function() {
    sleep(1);
    return Inertia::render('Settings');
});

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return Inertia::render('Dashboard');
//    })->name('dashboard');
//    Route::get('/users', function() {
//        return Inertia::render('Users', [
//            'users' => ['Chris', 'Jon', 'Kelly', 'Rushabh']
//        ]);
//    });
//    Route::get('/settings', function() {
//        return Inertia::render('Settings');
//    });
//});
