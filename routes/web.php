<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataUserControllers;
use App\Http\Controllers\HadiahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;
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


/**
 * start admin route
 */
// Route::middleware(['usersession'])->group(function () {
Route::group(['middleware' => ['cekloginadmin']], function () {

    Route::get('/dashboard-admin', [DashboardController::class, 'DashboardAdmin'])->name('dashboard-admin');
    Route::get('/logout-admin', [AuthController::class, 'logoutadmin'])->name('logout-admin');


    // User
    Route::resource('/data-user', DataUserControllers::class);
    Route::get('/get-data-users', [DataUserControllers::class, 'dataTable'])->name('data-users.getDataAll');

    //Member
    Route::resource('/data-member', MemberController::class);
    Route::get('/get-data-member', [MemberController::class, 'dataTable'])->name('data-member.getDataAll');

    //Produk
    Route::resource('/data-produk', ProdukController::class);
    Route::get('/get-data-produk', [ProdukController::class, 'dataTable'])->name('data-produk.getDataAll');

    Route::resource('/data-hadiah', HadiahController::class);
    Route::get('/get-data-hadiah', [HadiahController::class, 'dataTable'])->name('data-hadiah.getDataAll');

});

Route::group(['middleware' => ['ceksessionadmin']], function () {
    Route::post('/cek-login-admin', [AuthController::class, 'checkloginAdmin'])->name('cek-login-admin');
    Route::get('/login-admin', [AuthController::class, 'loginadmin'])->name('login-admin');
});

/**
 * end admin route
 */

/**
  * start member route
  */
  Route::get('/mobile', function () {
    return view('member.index');
});

Route::group(['middleware' => ['cekloginmember']], function () {
    Route::get('/dashboard-member', [DashboardController::class, 'DashboardMember'])->name('dashboard-member');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->name('Home.member');

    //Pembelian
    Route::resource('/pembelian', PembelianController::class);
    Route::get('/get-pembelian', [PembelianController::class, 'dataTable'])->name('pembelian.getDataAll');

    Route::resource('/data-bank', BankController::class);
});

Route::group(['middleware' => ['ceksessionmember']], function () {
    Route::post('/cek-login-member', [AuthController::class, 'checkloginMember'])->name('cek-login-member');
    Route::get('/', [AuthController::class, 'loginmember'])->name('login-member');
    Route::get('/daftar-member', [AuthController::class, 'daftarmember'])->name('daftar-member');
    Route::post('/register-member', [AuthController::class, 'savemember'])->name('save-member');
});

/**
 * end member route
 */
