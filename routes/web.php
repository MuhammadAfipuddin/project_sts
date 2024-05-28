<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DataPengajuanCutiController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengajuanBarangController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReimbursementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['isLoginValid'])->group(function () {

    // DASHBOARD
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');


    // KAS KEUANGAN
    Route::resource("pemasukan", PemasukanController::class);
    Route::resource("pengeluaran", PengeluaranController::class);
    Route::resource("reimbursement", ReimbursementController::class);

    // INVENTORY
    Route::resource("inventory", InventoryController::class);
    Route::get("tambahStok", [InventoryController::class, "tambahStok"])->name('tambahStok');
    Route::get("page_update_stok/{id}", [InventoryController::class, "page_update_stok"])->name('page_update_stok');

    // PENGADAAN BARANG
    Route::resource("peminjaman", PeminjamanController::class);
    Route::resource("pengajuan", PengajuanBarangController::class);
    Route::resource("datapengajuancuti", DataPengajuanCutiController::class);

    //GROUP LAPORAN
    Route::group(["prefix" => "laporan", "as" => "laporan."], function () {

        // kas keuangan
        Route::get("laporanKas", [LaporanController::class, 'laporanKas'])->name("laporanKas");
        Route::get("dtlKasPemasukan/{id_masuk}", [LaporanController::class, 'dtlKasPemasukan'])->name("dtlKasPemasukan");
        Route::get("dtlKasPengeluaran/{id_keluar}", [LaporanController::class, 'dtlKasPengeluaran'])->name("dtlKasPengeluaran");

        // reimbursement
        Route::get("dtlReimbursement/{idReimbursement}", [LaporanController::class, 'dtlReimbursement'])->name("dtlReimbursement");
        Route::get("dtlPengembalian/{idKembali}", [LaporanController::class, 'dtlPengembalian'])->name('dtlPengembalian');
        Route::get("persetujuan/{id_persetujuan}/{status}", [LaporanController::class, 'persetujuan_reimbursement'])->name('persetujuan');

        // inventory
        Route::get("dtlInventory/{idInven}", [LaporanController::class, 'dtlInventory'])->name("dtlInventory");
        Route::get("dtlLapin", [LaporanController::class, 'dtlLapin'])->name("dtlLapin");
        Route::get("hapusBarang", [InventoryController::class, 'destroy'])->name("hapusBarang");

        // peminjaman
        Route::get("dtlPeminjamanBrg/{id_pinjam_barang}", [LaporanController::class, 'dtlPeminjamanBrg'])->name("dtlPeminjamanBrg");
        Route::get("persetujuan_peminjaman/{id_persetujuan_peminjaman}/{status}", [LaporanController::class, 'persetujuan_peminjaman'])->name('persetujuan_peminjaman');

        // pengajuan barang
        Route::get("dtlPengajuanBarang/{idPengajuanBrg}", [LaporanController::class, 'dtlPengajuanBarang'])->name("dtlPengajuanBarang");
        Route::get("persetujuan_pengajuan/{id_persetujuan_pengajuan}/{status}", [LaporanController::class, 'persetujuan_pengajuan'])->name('persetujuan_pengajuan');
        Route::post('catatan_pengajuan/{id_catatan}/{menu}', [DataPengajuanCutiController::class, 'catatan'])->name('catatan_pengajuan');

        // serah terima barang
        Route::get("dtlSerahTerima/{idSerahTerima}", [LaporanController::class, 'dtlSerahTerima'])->name("dtlSerahTerima");
        Route::get("laporanPengadaan", [LaporanController::class, 'laporanPengadaan'])->name("laporanPengadaan");

        // pengajuan cuti
        Route::get("dtlCuti/{idCuti}", [LaporanController::class, 'dtlCuti'])->name("dtlCuti");
        Route::get("persetujuan_cuti/{id_persetujuan_cuti}/{status}", [LaporanController::class, 'persetujuan_cuti'])->name('persetujuan_cuti');
        Route::post('catatan/{id_catatan}/{menu}', [DataPengajuanCutiController::class, 'catatan'])->name('catatan');

        // laporan cuti
        Route::get("laporanCuti", [LaporanController::class, 'laporanCuti'])->name("laporanCuti");
    });

    // USER
    Route::resource("userManagement", UserController::class);
    Route::get("tambahUser", [UserController::class, "tambahUser"])->name('tambahUser');
    Route::delete("delete/{id}", [UserController::class, "destroy"])->name('deleteUser');

    // PROFILE
    Route::resource("profile", ProfileController::class);

    // NOTIF
    Route::get('/fetchNotif', [NotificationController::class, 'fetchNotifications'])->name('fetchNotif');

});
