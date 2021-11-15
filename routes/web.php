<?php

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
    return view('auth.login');
});

Auth::routes();
Route::post('/add', [App\Http\Controllers\ArticleController::class, 'add'])->name('home');

Route::get('/home', [App\Http\Controllers\ArticleController::class, 'index'])->name('home');
Route::post('/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('store');
Route::get('edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('edit');
Route::patch('update/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('update');
Route::delete('destroy/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('destroy');



//-------------------------------category-------------------------------------------------
Route::post('/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('home');
Route::post('/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('create');
Route::post('/insert', [App\Http\Controllers\CategoryController::class, 'store'])->name('store');

Route::post('/tagindex', [App\Http\Controllers\TagController::class, 'index'])->name('home');
Route::post('/tagcreate', [App\Http\Controllers\TagController::class, 'create'])->name('home');
Route::post('/storetag', [App\Http\Controllers\TagController::class, 'store'])->name('home');
//Route::patch('updatetag/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('update');
//Route::delete('destroytag/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('destroy');

//-------------------------------------------------------------------------------
//List articless to homepage
    Route::post('/listarticles', [App\Http\Controllers\PublicController::class, 'index'])->name('home');
    Route::get('/showarticles', [App\Http\Controllers\PublicController::class, 'show'])->name('home');



// -----------------------------login-----------------------------------------
 Route::get('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
// Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');
//Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// // ------------------------------register---------------------------------------
// Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');
// Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@storeUser')->name('register');

// -----------------------------forget password ------------------------------
Route::get('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@getEmail')->name('forget-password');
Route::post('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@postEmail')->name('forget-password');

Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');

// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
// -----------------------------forget password ------------------------------
Route::get('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@getEmail')->name('forget-password');
Route::post('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@postEmail')->name('forget-password');