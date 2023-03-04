<?php

use App\Models\User;
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
        // KU Share: paginated users returns an object with extra info (currentPage, nextPage, url links, etc)
        // But it does return all the user data from the database too (because it creates a new colleciton)
        'paginatedUsers' => User::paginate(10),
        // KU share: Can use ->through() to apply map to the current slice of items rather than creating a new collection
        'restrictedPaginatedUsers' => User::paginate(10)->through(fn($user) => [
            'id' => $user->id,
            'name' => $user->name,
        ]),
        // KU Share: Laravel's map(fn) method to reduce data returned to front end
        'users' => User::all()->map(fn($user) => [
            'id' => $user->id,
            'name' => $user->name,
        ]),
        'usersOld' => User::all()->map(function ($user) {
            return $user->name;
        }),
        'time' => now()->toTimeString(),
    ]);
});
Route::get('/settings', function() {
    sleep(1);
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
   dd('logging out...');
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
