<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\AdminTiketController;
use App\Http\Controllers\AdminDivisiController;
use App\Http\Controllers\AdminBalasanController;

use App\Http\Controllers\OperatorClientController;
use App\Http\Controllers\OperatorTiketController;
use App\Http\Controllers\OperatorBalasanController;

use App\Http\Controllers\ClientTiketController;
use App\Http\Controllers\ClientBalasanController;
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


Auth::routes();

Route::get('login/user', [App\Http\Controllers\Auth\UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('login/user', [App\Http\Controllers\Auth\UserLoginController::class, 'login'])->name('user.loginSubmit');

// Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::get('/', [App\Http\Controllers\TolakController::class, 'index']);

Route::prefix('admin')->group(function () {
    // Route::get('/admin', [App\Http\Controllers\TolakController::class, 'index']);
    Route::get('/', [App\Http\Controllers\TolakController::class, 'index']);
    Route::get('home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('profile', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.show');

    // Client search
    Route::get('client/email_search', [App\Http\Controllers\AdminFilterController::class, 'email_client'])->name('admin.client.email_search');
    Route::get('client/name_search', [App\Http\Controllers\AdminFilterController::class, 'name_client'])->name('admin.client.name_search');
    Route::get('client/perusahaan_search', [App\Http\Controllers\AdminFilterController::class, 'name_perusahaan_client'])->name('admin.client.perusahaan_search');
    Route::get('client/telp_search', [App\Http\Controllers\AdminFilterController::class, 'telp_client'])->name('admin.client.telp_search');
    Route::get('client/role_search', [App\Http\Controllers\AdminFilterController::class, 'role_client'])->name('admin.client.role_search');

    // User search
    Route::get('user/email_search', [App\Http\Controllers\AdminFilterController::class, 'email_user'])->name('admin.user.email_search');
    Route::get('user/name_search', [App\Http\Controllers\AdminFilterController::class, 'name_user'])->name('admin.user.name_search');
    Route::get('user/telp_search', [App\Http\Controllers\AdminFilterController::class, 'telp_user'])->name('admin.user.telp_search');
    Route::get('user/divisi_filter/{divisi}', [App\Http\Controllers\AdminFilterController::class, 'divisi_user'])->name('admin.user.divisi_filter');
    Route::get('user/role_filter/{role}', [App\Http\Controllers\AdminFilterController::class, 'role_user'])->name('admin.user.role_filter');

    // Tiket search
    Route::get('tiket/search', [App\Http\Controllers\AdminFilterController::class, 'search'])->name('admin.tiket.search');
    Route::get('tiket/status_filter/{status}', [App\Http\Controllers\AdminFilterController::class, 'status_tiket'])->name('admin.tiket.status_filter');
    Route::get('tiket/divisi_filter/{divisi}', [App\Http\Controllers\AdminFilterController::class, 'divisi_tiket'])->name('admin.tiket.divisi_filter');
    Route::get('tiket/name_filter/{name}', [App\Http\Controllers\AdminFilterController::class, 'name_tiket'])->name('admin.tiket.name_filter');
    Route::get('tiket/update_filter', [App\Http\Controllers\AdminFilterController::class, 'update_tiket'])->name('admin.tiket.update_filter');

    // Download
    Route::post('tiket/file_download', [App\Http\Controllers\AdminDownloadController::class, 'tiket_file_download'])->name('admin.tiket.file_download');
    Route::post('balasan/file_download', [App\Http\Controllers\AdminDownloadController::class, 'balasan_file_download'])->name('admin.balasan.file_download');

    // Tutup Tiket
    Route::get('tiket/tutup/{id}', [App\Http\Controllers\AdminTiketController::class, 'tutupTiket'])->name('admin.tiket.tutup');

    // CRUD
    Route::resource('user', AdminUserController::class, ['as' => 'admin']);
    Route::resource('client', AdminClientController::class, ['as' => 'admin']);
    Route::resource('tiket', AdminTiketController::class, ['as' => 'admin']);
    Route::resource('divisi', AdminDivisiController::class, ['as' => 'admin']);
    Route::resource('balasan', AdminBalasanController::class, ['as' => 'admin']);
});

Route::prefix('operator')->group(function () {
    // any route here will only be accessible for logged in users
    Route::get('/', [App\Http\Controllers\TolakController::class, 'index']);
    Route::get('home', [App\Http\Controllers\OperatorController::class, 'index'])->name('operator');
    Route::get('profile', [App\Http\Controllers\OperatorController::class, 'show'])->name('operator.show');
    Route::get('profile/edit', [App\Http\Controllers\OperatorController::class, 'edit'])->name('operator.edit');
    Route::post('profile/update', [App\Http\Controllers\OperatorController::class, 'update'])->name('operator.update');

    // Tiket search
    Route::get('tiket/user_search', [App\Http\Controllers\OperatorSearchController::class, 'user_tiket'])->name('operator.tiket.user_search');
    Route::get('tiket/client_search', [App\Http\Controllers\OperatorSearchController::class, 'client_tiket'])->name('operator.tiket.client_search');
    Route::get('tiket/judul_search', [App\Http\Controllers\OperatorSearchController::class, 'judul_tiket'])->name('operator.tiket.judul_search');
    Route::get('tiket/status_search', [App\Http\Controllers\OperatorSearchController::class, 'status_tiket'])->name('operator.tiket.status_search');
    Route::get('tiket/balasan_terbaru_search', [App\Http\Controllers\OperatorSearchController::class, 'balasan_terbaru_tiket'])->name('operator.tiket.balasan_terbaru_search');

    // Download
    Route::post('tiket/file_download', [App\Http\Controllers\OperatorDownloadController::class, 'tiket_file_download'])->name('operator.tiket.file_download');
    Route::post('balasan/file_download', [App\Http\Controllers\OperatorDownloadController::class, 'balasan_file_download'])->name('operator.balasan.file_download');

    // Tutup Tiket
    Route::get('tiket/tutup/{id}', [App\Http\Controllers\OperatorTiketController::class, 'tutupTiket'])->name('operator.tiket.tutup');


    Route::resource('client', OperatorClientController::class, ['as' => 'operator']);
    Route::resource('tiket', OperatorTiketController::class, ['as' => 'operator']);
    Route::resource('balasan', OperatorBalasanController::class, ['as' => 'operator']);
});


Route::prefix('client')->group(function () {
    // any route here will only be accessible for logged in users
    Route::get('/', [App\Http\Controllers\TolakController::class, 'index']);
    Route::get('home', [App\Http\Controllers\ClientController::class, 'index'])->name('client');
    Route::get('profile', [App\Http\Controllers\ClientController::class, 'show'])->name('client.show');
    Route::get('profile/edit', [App\Http\Controllers\ClientController::class, 'edit'])->name('client.edit');
    Route::post('profile/update', [App\Http\Controllers\ClientController::class, 'update'])->name('client.update');

    // Tiket search
    Route::get('tiket/judul_search', [App\Http\Controllers\ClientSearchController::class, 'judul_tiket'])->name('client.tiket.judul_search');
    Route::get('tiket/status_search', [App\Http\Controllers\ClientSearchController::class, 'status_tiket'])->name('client.tiket.status_search');
    Route::get('tiket/divisi_search', [App\Http\Controllers\ClientSearchController::class, 'divisi_tiket'])->name('client.tiket.divisi_search');
    Route::get('tiket/balasan_terbaru_search', [App\Http\Controllers\ClientSearchController::class, 'balasan_terbaru_tiket'])->name('client.tiket.balasan_terbaru_search');

    // Download
    Route::post('tiket/file_download', [App\Http\Controllers\ClientDownloadController::class, 'tiket_file_download'])->name('client.tiket.file_download');
    Route::post('balasan/file_download', [App\Http\Controllers\ClientDownloadController::class, 'balasan_file_download'])->name('client.balasan.file_download');

    // Tutup Tiket
    Route::get('tiket/tutup/{id}', [App\Http\Controllers\ClientTiketController::class, 'tutupTiket'])->name('client.tiket.tutup');

    Route::resource('tiket', ClientTiketController::class, ['as' => 'client']);
    Route::resource('balasan', ClientBalasanController::class, ['as' => 'client']);
});
