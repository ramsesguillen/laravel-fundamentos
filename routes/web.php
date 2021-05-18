<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');


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
