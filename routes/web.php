<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;


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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return redirect()->route('page.show', ['name' => 'home']);
//});
Route::get('/', [PageController::class, 'show'])->defaults('name', 'home')->name('home');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/page/{name}', [PageController::class, 'show'])->name('page.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/admin', function () {
    return view('pages.home');
})->middleware('auth')->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



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


Route::delete('/edit/portfolio/delete','App\Http\Controllers\PortfolioController@delete')->name('edit.portfolio.delete'); // TODO authenticate user
Route::patch('/edit/portfolio/update','App\Http\Controllers\PortfolioController@edit')->name('edit.portfolio.update');
Route::post('/edit/portfolio/create','App\Http\Controllers\PortfolioController@create')->name('edit.portfolio.create');
