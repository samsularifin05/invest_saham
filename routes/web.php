<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataUserControllers;
use App\Http\Controllers\MemberController;
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



// Route::middleware(['usersession'])->group(function () {
Route::group(['middleware' => ['cekloginadmin']], function () {
    Route::get('/dashboard-admin', function () {
        return view('admin.dashboard.index');
    })->name('dashboard-admin');

    Route::get('/logout-admin', [AuthController::class, 'logoutadmin'])->name('logout-admin');
    Route::resource('/data-user', DataUserControllers::class);
    Route::get('/get-data-users', [DataUserControllers::class, 'dataTable'])->name('data-users.getDataAll');

    Route::resource('/data-member', MemberController::class);
    Route::get('/get-data-member', [MemberController::class, 'dataTable'])->name('data-member.getDataAll');
});

Route::group(['middleware' => ['ceksessionadmin']], function () {
    Route::post('/cek-login-admin', [AuthController::class, 'checkloginAdmin'])->name('cek-login-admin');
    Route::get('/login-admin', [AuthController::class, 'loginadmin'])->name('login-admin');
});

Route::group(['middleware' => ['cekloginmember']], function () {
    Route::get('/dashboard-member', function () {
        return view('member.dashboard.index');
    })->name('dashboard-member');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['ceksessionmember']], function () {
    Route::post('/cek-login-member', [AuthController::class, 'checkloginMember'])->name('cek-login-member');
    Route::get('/', [AuthController::class, 'loginmember'])->name('login-member');
    Route::get('/daftar-member', [AuthController::class, 'daftarmember'])->name('daftar-member');
    Route::post('/register-member', [AuthController::class, 'savemember'])->name('save-member');
});
