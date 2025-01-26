<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkkmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\PoinkuController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DatainfoController;
use App\Http\Controllers\DatauserController;
use App\Http\Controllers\TatacaraController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\BerkastatacaraController;
use App\Http\Controllers\Auth\ChangePasswordController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/', [WelcomeController::class, 'index']);
Route::middleware(['auth'])->group(function () {

    //rote dasboard
    Route::get('/dashboard', [BerandaController::class, 'index'])->name('dashboard');

    Route::middleware(['mahasiswa'])->group(function () {

        //tatacara
        Route::resource('tatacara', TatacaraController::class);
        Route::get('tatacara/unduh/{id}', [TatacaraController::class, 'unduh'])->name('tatacara.unduh');
        //Skkm
        Route::resource('skkm', SkkmController::class);
        //info_poin
        Route::get('datainfo.data1', [DatainfoController::class, 'data1'])->name('datainfo.data1');
        Route::get('datainfo.data2', [DatainfoController::class, 'data2'])->name('datainfo.data2');
        Route::get('datainfo.data3', [DatainfoController::class, 'data3'])->name('datainfo.data3');
        Route::get('datainfo.data4', [DatainfoController::class, 'data4'])->name('datainfo.data4');
        Route::get('datainfo.data5', [DatainfoController::class, 'data5'])->name('datainfo.data5');
        Route::get('datainfo.data6', [DatainfoController::class, 'data6'])->name('datainfo.data6');
        Route::get('datainfo.data7', [DatainfoController::class, 'data7'])->name('datainfo.data7');
        Route::get('datainfo.data8', [DatainfoController::class, 'data8'])->name('datainfo.data8');
        Route::get('datainfo.data9', [DatainfoController::class, 'data9'])->name('datainfo.data9');
        // poinku
        Route::resource('poinku', PoinkuController::class);
        //cetak poin
        Route::get('cetak', [PoinkuController::class, 'cetak_poin'])->name('cetak');
    });

    Route::middleware(['adminutama'])->group(function () {
        //data_user_mahasiswa
        Route::get('seluruhdata', [DatauserController::class, 'seluruhdata'])->name('seluruhdata');
        //data_user_mahasiswa
        Route::get('datamahasiswa', [DatauserController::class, 'datamahasiswa'])->name('datamahasiswa');
        //hapus_data_user_mahasiswa
        Route::get('datamahasiswa/hapusdatamahasiswa/{id}', [DatauserController::class, 'hapusdatamahasiswa'])->name('datamahasiswa.hapusdatamahasiswa');
        //data_user_bem
        Route::get('databem', [DatauserController::class, 'databem'])->name('databem');
        //hapus_data_user_bem
        Route::get('databem/hapusdatabem/{id}', [DatauserController::class, 'hapusdatabem'])->name('databem.hapusdatabem');
        //data_user_bem
        Route::resource('dataadmin', DatauserController::class);
        //data_user_admin
        Route::post('dataadmin/storeadmin', [DatauserController::class,'storeadmin'])->name('dataadmin.storeadmin');
        //Panduan SKKM
        Route::resource('berkas', BerkastatacaraController::class);
        Route::get('berkas/download/{id}', [BerkastatacaraController::class, 'download'])->name('berkas.download');
        Route::get('berkas/hapus/{id}', [BerkastatacaraController::class, 'hapus'])->name('berkas.hapus');
    });

    Route::middleware(['bem'])->group(function () {
        // Route::get('/dashboardbem', [BerandabemController::class, 'index'])->name('dashboardbem');
        //verifikasi_poin_BEM
        Route::resource('verifikasi', VerifikasiController::class);
        //poin ditolak
        Route::get('verifikasi/tolak/{id}', [VerifikasiController::class, 'tolak'])->name('verifikasi.tolak');
        //hapus poin
        // Route::get('verifikasi/hapus/{id}', [VerifikasiController::class, 'hapus'])->name('verifikasi.hapus');
        //belum verifikasi
        Route::get('verifikasi.belumverifi', [VerifikasiController::class, 'belumverifi'])->name('verifikasi.belumverifi');
        //sudah verifikasi
        Route::get('verifikasi.sudahverifi', [VerifikasiController::class, 'sudahverifi'])->name('verifikasi.sudahverifi');
        //ditolak
        Route::get('verifikasi.ditolak', [VerifikasiController::class, 'ditolak'])->name('verifikasi.ditolak');
        //keterangan tolak
        Route::post('verifikasi/keterangan/{id}', [VerifikasiController::class, 'keterangan_tolak'])->name('verifikasi.keterangan');
    });

    // edit_profil
    Route::resource('profil', UserController::class);
    Route::get('ubahpassword', [ChangePasswordController::class, 'index'])->name('ubahpassword'); //ubah password
    Route::post('passwordupdate', [ChangePasswordController::class, 'ubahpaswod'])->name('passwordupdate'); //ubah password
});
require __DIR__ . '/auth.php';
