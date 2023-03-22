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
//    sleep(1);
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
//    sleep(1);
    return Inertia::render('Users/Index', [
        // This returns all the user data from the database (because it creates a new collection)
        'paginatedUsers' => User::paginate(10),
        // KU share: Can use ->through() to apply map to the current slice of items rather than creating a new collection
        'restrictedPaginatedUsers' => User::query()
            // KU Share new: ->when() request matches condition, append to query in this way
            ->when(Request::input('search'), function($query, $searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%");
            })
            // KU Share new: paginated users returns an object with extra info (currentPage, nextPage, url links, etc)
            ->paginate(10)
            // KU share new: ->withQueryString() keeps the query string when switching between paginated links
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
        ]),
        // filters send a list of approved filters to the front end
        'filters' => Request::only(['search']),
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

Route::get('/users/create', function () {
   return Inertia::render('Users/Create');
});

Route::get('/settings', function() {
    // sleep was just to show the progress bar working
//    sleep(1);
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
   dd('logging out...');
});

// TODO: chris 22/03/2023 - KU Share: This has to be in web.php - why doesn't it work in api.php?
Route::post('/users', function () {
    // KU Share: Lesson 21: To test throttling sleep for 3s and try submitting lots of forms after each other
//    sleep(3);
    // Validate the request
    $validatedAttributes = Request::validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',
    ]);

    // Create the user
    User::create($validatedAttributes);

    // redirect
    return redirect('/users');
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
