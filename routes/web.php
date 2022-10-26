<?php

use App\Models\User;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminsupportsController;

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
    Route::get('/private', function () 
    {
        $users = User::orderBy('created_at', 'desc')->limit(5)->get();
        $supports = Support::orderBy('created_at', 'desc')->limit(5)->get();
        return view('Auth/Dashboard_Admin/dashboard', compact('users', 'supports'));
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


//----------------------------------------------------------------CRUD Route::Search-------------------------------------------------------------

Route::get('/home/search', [HomeController::class, 'search'])->name('home.search')->middleware(['auth']);




//----------------------------------------------------------------ADMIN-------------------------------------------------------------
                        //--------------------CRUD Route::users-------------------------
Route::get('/users', [AdminUsersController::class, 'index'])->name('users')->middleware(['role:admin']);
Route::get('/users/create', [AdminUsersController::class, 'create'])->name('create.user')->middleware(['role:admin']);
Route::post('/users/create', [AdminUsersController::class, 'store'])->name('store.user')->middleware(['role:admin']);
Route::get('/users/show/{user}', [AdminUsersController::class, 'show'])->name('show.user')->middleware(['role:admin']);
Route::get('/users/edit/{user}', [AdminUsersController::class, 'edit'])->name('edit.user')->middleware(['role:admin']);
Route::put('/users/update/{user}', [AdminUsersController::class, 'update'])->name('update.user')->middleware(['role:admin']);
Route::delete('/users/delete/{user}', [AdminUsersController::class, 'destroy'])->name('delete.user')->middleware(['role:admin']);

                        //--------------------CRUD Route::supports-------------------------
Route::get('/supports', [AdminsupportsController::class, 'index'])->name('supports')->middleware(['role:admin']);
Route::get('/supports/create', [AdminsupportsController::class, 'create'])->name('create.support')->middleware(['role:admin']);
Route::post('/supports/create', [AdminsupportsController::class, 'store'])->name('store.support')->middleware(['role:admin']);
Route::get('/supports/show/{support}', [AdminsupportsController::class, 'show'])->name('show.support')->middleware(['role:admin']);
Route::get('/supports/edit/{support}', [AdminsupportsController::class, 'edit'])->name('edit.support')->middleware(['role:admin']);
Route::put('/supports/update/{support}', [AdminsupportsController::class, 'update'])->name('update.support')->middleware(['role:admin']);
Route::delete('/supports/delete/{support}', [AdminsupportsController::class, 'destroy'])->name('delete.support')->middleware(['role:admin']);
