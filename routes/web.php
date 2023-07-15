<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TabelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiAdminController;
use App\Http\Controllers\TransaksiGuruController;
use App\Http\Controllers\UserManagementController;
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
Route::get('/tabel', [UserController::class, 'usertabel'])->name('user');
Route::get('/alternatif', [UserController::class, 'useralternatif']);
Route::get('/kriteria', [UserController::class, 'userkriteria']);
Route::get('/kelas', [UserController::class, 'userkelas']);
Route::get('/siswa', [UserController::class, 'usersiswa']);

route::middleware(['auth', 'guru'])->group(function () {
	Route::get('/transaksiuser', [UserController::class, 'transaksi']);
	Route::get('transaksiguru_next/{id}', [UserController::class, 'view']);
	Route::post('/transaksiuser_add_nilai/', [UserController::class, 'create_nilai']);
	Route::post('/transaksigurus_update/{id}', [UserController::class, 'update']);
});

route::middleware(['auth', 'isAdmin'])->group(function () {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('home');
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

	// ------------------------ alternatif
	Route::get('tambah-alternatif', [AlternatifController::class, 'tambah']);
	Route::get('alternatif_admin', [AlternatifController::class, 'index']);
	Route::post('insert-alternatif', [AlternatifController::class, 'insert']);
	Route::get('edit-alternatif/{id}', [AlternatifController::class, 'edit']);
	Route::put('update-alternatif/{id}', [AlternatifController::class, 'update']);
	Route::get('hapus-alternatif/{id}', [AlternatifController::class, 'destroy']);
	// ------------------------ Kriteria
	Route::get('tambah-kriteria', [KriteriaController::class, 'tambah']);
	Route::get('kriteria_admin', [KriteriaController::class, 'index']);
	Route::post('insert-kriteria', [KriteriaController::class, 'insert']);
	Route::get('edit-kriteria/{id}', [KriteriaController::class, 'edit']);
	Route::put('update-kriteria/{id}', [KriteriaController::class, 'update']);
	Route::get('hapus-kriteria/{id}', [KriteriaController::class, 'destroy']);
	Route::get('usermanagement', [ProfileController::class, 'index']);

	Route::get('/usermanagement', [UserManagementController::class, 'index']);
	Route::get('/usermanagement_delete/{id}', [UserManagementController::class, 'delete']);
	Route::post('/usermanagement_add', [UserManagementController::class, 'create']);
	Route::post('/usermanagement_update/{id}', [UserManagementController::class, 'update']);
	// ------------------------ guru
	Route::get('/guru_admin', [GuruController::class, 'index']);
	Route::get('/guru_delete/{id}', [GuruController::class, 'delete']);
	Route::post('/guru_add', [GuruController::class, 'create']);
	Route::post('/guru_update/{id}', [GuruController::class, 'update']);
	// ------------------------ Siswa
	Route::get('/siswa_admin', [SiswaController::class, 'index']);
	Route::get('/siswa_delete/{id}', [SiswaController::class, 'delete']);
	Route::post('/siswa_add', [SiswaController::class, 'create']);
	Route::post('/siswa_update/{id}', [SiswaController::class, 'update']);
	// ------------------------ kelas
	Route::get('/kelas_admin', [KelasController::class, 'index']);
	Route::get('/kelas_delete/{id}', [KelasController::class, 'delete']);
	Route::post('/kelas_add', [KelasController::class, 'create']);
	Route::post('/kelas_update/{id}', [KelasController::class, 'update']);
	// ------------------------ Transaksi
	Route::get('/transaksi_admin', [TransaksiController::class, 'index']);
	Route::get('/transaksi_delete/{id}', [TransaksiController::class, 'delete']);
	Route::post('/transaksi_add', [TransaksiController::class, 'create']);
	Route::post('/transaksi_update/{id}', [TransaksiController::class, 'update']);

	// Route::get('transaksiguru_admin/{id_guru}/{id}', [TransaksiController::class, 'nilai2_admin']);
	// ------------------------ Transaksi Guru
	Route::get('/transaksiguru_admin', [TransaksiGuruController::class, 'index']);
	Route::get('/transaksiguru_delete/{id}', [TransaksiGuruController::class, 'delete']);
	Route::post('/transaksiguru_add', [TransaksiGuruController::class, 'create']);
	Route::post('/nilai_update/{id}', [TransaksiGuruController::class, 'update']);
	// ------------------------ Transaksi Guru
	Route::get('transaksiguru_admin/{id_guru}', [TransaksiController::class, 'nilai_admin']);
	Route::get('/transaksiguru_delete/{id}', [TransaksiGuruController::class, 'delete']);
	Route::post('/transaksiguru_add_nilai/', [TransaksiGuruController::class, 'create_nilai']);
	Route::post('/transaksiguru_update/{id}', [TransaksiGuruController::class, 'update']);


	Route::get('/transaksigurus_add', [TransaksiAdminController::class, 'index2']);
	Route::get('/transaksigurus_edit/{id}', [TransaksiAdminController::class, 'edit']);
	Route::post('/update_transaksi/{id}', [TransaksiAdminController::class, 'update']);
	Route::post('/transaksigurus_create', [TransaksiAdminController::class, 'tambah']);

	Route::post('/transaksimodalguru_add', [TransaksiAdminController::class, 'guruadd']);
	Route::post('/transaksimodalsiswa_add', [TransaksiAdminController::class, 'siswaadd']);
	Route::get('/transaksisiswa_delete/{id}', [TransaksiAdminController::class, 'deletesiswa']);
	Route::get('/transaksiguru_delete/{id}', [TransaksiAdminController::class, 'deleteguru']);

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
