<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KontaktController;
use App\Http\Controllers\GlownyController;
use App\Http\Controllers\PanelController;

//strona glowna
Route::get('/', 'App\Http\Controllers\GlownyController@index' )->name('index');
Route::get('/oferty', 'App\Http\Controllers\GlownyController@oferty' )->name('oferty');
Route::get('/nieruchomosc/{id}', 'App\Http\Controllers\GlownyController@nieruchomosc' )->name('id.nieruchomosc');
Route::get('/wyszukanie', 'App\Http\Controllers\WyszukiwarkaController@search' )->name('wyszukaj');
// Route::get('/panel', 'App\Http\Controllers\GlownyController@panel' )->name('panel');


Route::post('/contact', 'App\Http\Controllers\KontaktController@store' )->name('wyslij');
Route::resource('kontakt', PanelController::class);

//logowanie
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

//rejestracja
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store')->name('register.store');
});

//admin
    Route::get('/a', 'App\Http\Controllers\AdminController@index' )->name('admin.index');
    Route::resource('Anieruchomosci', 'App\Http\Controllers\NieruchomosciController');
    Route::resource('Aagenci', 'App\Http\Controllers\AgentController');
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('Amiesiac', 'App\Http\Controllers\Agent_miesController');
    Route::resource('Azapytania', 'App\Http\Controllers\ZapytaniaController');

