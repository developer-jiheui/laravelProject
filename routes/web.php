<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\AdminController;


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

//-------JIHEUI
//PAGES
Route::get('/', [PageController::class, 'show'])->defaults('name', 'home')->name('home');
Route::get('/page/{name}', [PageController::class, 'show'])->name('page.show');

//LOGIN, LOG OUT
Route::get('/login', function () {return view('pages.login');});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//USER CRUD
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::middleware('auth')->post('/edit/profile', [UserController::class, 'edit_profile'])->name('edit.profile');
Route::middleware('auth')->post('/update/profile', [UserController::class, 'update'])->name('update.profile');

//ADMIN

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
});
Route::get('/admin/profile', function () {return view('admin.profile');})->middleware('auth')->name('admin.profile');

Route::get('/admin-debug', function () {
    $users = \App\Models\User::all();
    return view('pages.admin', compact('users'));
});
Route::middleware(['auth'])->group(function () {
    Route::post('/admin/promote/{id}', [AdminController::class, 'promote'])->name('admin.promote');
    Route::post('/admin/demote/{id}', [AdminController::class, 'demote'])->name('admin.demote');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});
//USER
Route::get('/profile', function () {return view('pages.profile');})->middleware('auth')->name('profile');

//-----------------



Route::middleware('auth')->get('/edit/home', function () {
    return view('edit.home');
})->name('edit.home');
Route::middleware('auth')->get('/edit/bio', function () {
    return view('edit.bio');
})->name('edit.bio');
Route::middleware('auth')->get('/edit/blog', function () {
    return view('edit.blog');
})->name('edit.blog');


//VIATRIX ---------------

Route::get('/edit/portfolio', function () {
    return view('edit.portfolio');
})->name('edit.portfolio');
Route::delete('/edit/portfolio/delete','App\Http\Controllers\PortfolioController@delete')->name('edit.portfolio.delete'); // TODO authenticate user
Route::patch('/edit/portfolio/update','App\Http\Controllers\PortfolioController@edit')->name('edit.portfolio.update');
Route::post('/edit/portfolio/create','App\Http\Controllers\PortfolioController@create')->name('edit.portfolio.create');

//GEORGE ---------------

Route::get('/edit/blog', function () {
    return view('edit.blog');
})->name('edit.blog');
Route::delete('/edit/blog/delete','App\Http\Controllers\BlogController@delete')->name('edit.blog.delete');
Route::patch('/edit/blog/update','App\Http\Controllers\BlogController@edit')->name('edit.blog.update');
Route::post('/edit/blog/create','App\Http\Controllers\BlogController@create')->name('edit.blog.create');
