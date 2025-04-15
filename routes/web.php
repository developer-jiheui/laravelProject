<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/page/{name}', [PageController::class, 'show'])->name('page.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth')->get('/edit/home', function () {
    return view('edit.home');
})->name('edit.home');
Route::middleware('auth')->get('/edit/bio', function () {
    return view('edit.bio');
})->name('edit.bio');
Route::middleware('auth')->get('/edit/blog', function () {
    return view('edit.blog');
})->name('edit.blog');
Route::get('/edit/portfolio', function () {
    return view('edit.portfolio');
})->name('edit.portfolio');
Route::middleware('auth')->get('/edit/resume', function () {
    return view('edit.resume');
})->name('edit.resume');
Route::get('/admin', function () {
    return view('pages.home');
})->middleware('auth');
