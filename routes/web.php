<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// DB::create();

// DB::listen( function( $query ) {
//     echo '<pre>';
//         var_dump( $query->time );//
//     echo '</pre>';
// });
// DB::listen( function( $query ) {
//     echo '<pre>';
//         var_dump( $query->sql );//
//     echo '</pre>';
// });

Route::get('/roles', function () {
    return \App\Models\Rol::with('user')->get();
});

Route::view('/', 'welcome');
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('auth');

Route::resource('users', UserController::class);

Route::resource('messages', MessageController::class);

// CRear login de manera manual
Route::post('login', function () {
    $credentials = request()->only('email', 'password');

    $remenber = request()->filled('remember');

    if ( Auth::attempt( $credentials, $remenber ) )
    {
        request()->session()->regenerate();
        return redirect('dashboard');
    }

    return redirect('login');
});

Route::post('logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});
