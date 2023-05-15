<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Permission\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('store.index');
})->middleware(['auth', 'verified'])->name('home');


Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::post('/roles/assign/{id}', [RoleController::class, 'assign'])->name('roles.assign');
    Route::delete('/roles/remove/{id}', [RoleController::class, 'remove'])->name('roles.remove');
    Route::post('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::resource('/categories', CategorieController::class);
    Route::resource('/products', ProductController::class);
    Route::post('/categories/search', [CategorieController::class, 'search'])->name('categories.search');
    Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');



});









require __DIR__ . '/auth.php';