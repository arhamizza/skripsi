<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TabelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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
Route::get('/tabel', [UserController::class, 'index'])->name('user');

route::middleware(['auth', 'isAdmin'])->group(function () {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('tabel_admin', [TabelController::class, 'index']);
	Route::get('/dashboard_admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('tambah-linguistik', 'App\Http\Controllers\HomeController@tambah');
	Route::post('insert-linguistik', [App\Http\Controllers\HomeController::class, 'insert']);
	Route::get('edit-linguistik/{id}', [App\Http\Controllers\HomeController::class, 'edit']);
	Route::put('update-linguistik/{id}', [App\Http\Controllers\HomeController::class, 'update']);
	Route::get('hapus-linguistik/{id}', [App\Http\Controllers\HomeController::class, 'destroy']);
	Route::get('tambah-nilai', [TabelController::class, 'tambah']);
	Route::post('insert-nilai', [TabelController::class, 'insert']);
	Route::get('edit-nilai/{id}', [TabelController::class, 'edit']);
	Route::put('update-nilai/{id}', [TabelController::class, 'update']);
	Route::get('hapus-nilai/{id}', [TabelController::class, 'destroy']);
	Route::get('usermanagement', [ProfileController::class, 'index']);

});
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});


