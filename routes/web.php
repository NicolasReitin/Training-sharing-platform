<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupportController;

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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'role:admin'])->name('dashboard')->group(function () {
    Route::get('/private', function () {
        // return 'Bonjour Admin';
        return view('Auth/dashboard');
    });
});
//->middleware(['role:admin'])  //middleware for admin only



Route::get('/mysupports', [SupportController::class, 'index'])->name('mysupports');
