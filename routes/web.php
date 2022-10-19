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
//->middleware(['auth'])  //middleware for Formateurs


//----------------------------------------------------------------CRUD Route::Support-------------------------------------------------------------
Route::get('/mysupports', [SupportController::class, 'index'])->name('mysupports')->middleware(['auth']);
Route::get('/mysupports/create', [SupportController::class, 'create'])->name('create.supports')->middleware(['auth']);
Route::post('/mysupports/create', [SupportController::class, 'store'])->name('store.supports')->middleware(['auth']);
Route::get('/mysupports/show/{support}', [SupportController::class, 'show'])->name('show.supports')->middleware(['auth']);
Route::get('/mysupports/edit/{support}', [SupportController::class, 'edit'])->name('edit.supports')->middleware(['auth']);
Route::put('/mysupports/update/{support}', [SupportController::class, 'update'])->name('update.supports')->middleware(['auth']);
Route::delete('/mysupports/delete/{support}', [SupportController::class, 'destroy'])->name('delete.supports')->middleware(['auth']);

Route::put('/mysupports/delete/{support}/{item}', [SupportController::class, 'deleteFile'])->name('delete.file');

//----------------------------------------------------------------CRUD Route::Catégories-------------------------------------------------------------
Route::get('/categories', [CategorieController::class, 'index'])->name('categories')->middleware(['auth']);
Route::get('/categories/create', [CategorieController::class, 'create'])->name('create.categories')->middleware(['auth']);
Route::post('/categories/create', [CategorieController::class, 'store'])->name('store.categories')->middleware(['auth']);
Route::get('/categories/show/{categorie}', [CategorieController::class, 'show'])->name('show.categories')->middleware(['auth']);
Route::get('/categories/edit/{categorie}', [CategorieController::class, 'edit'])->name('edit.categories')->middleware(['auth']);
Route::put('/categories/update/{categorie}', [CategorieController::class, 'update'])->name('update.categories')->middleware(['auth']);
Route::delete('/categories/delete/{categorie}', [CategorieController::class, 'destroy'])->name('delete.categories')->middleware(['auth']);




