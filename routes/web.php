<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Main\UsersController;
use App\Http\Controllers\Main\BantuanController;
use App\Http\Controllers\Main\JabatanController;
use App\Http\Controllers\Main\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BantuController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\DidikController;
use App\Http\Controllers\EkoController;
use App\Http\Controllers\GovermentController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LingkungController;
use App\Http\Controllers\Main\EkonomiController;
use App\Http\Controllers\Main\FooterController;
use App\Http\Controllers\Main\InfografisController;
use App\Http\Controllers\Main\KemiskinanController;
use App\Http\Controllers\Main\KependudukanController;
use App\Http\Controllers\Main\LingkunganHidupController;
use App\Http\Controllers\Main\PemerintahanController;
use App\Http\Controllers\Main\PendidikanController;
use App\Http\Controllers\Main\PengingatController;
use App\Http\Controllers\Main\SosialController;
use App\Http\Controllers\MiskinController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SosiController;
use App\Http\Controllers\WelcomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Landingpage
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::resource('dataset', DatasetController::class);
Route::resource('ekonomi', EkoController::class);
Route::resource('kemiskinan', MiskinController::class);
Route::resource('kependudukan', PendudukController::class);
Route::resource('lingkungan', LingkungController::class);
Route::resource('pemerintahan', GovermentController::class);
Route::resource('pendidikan', DidikController::class);
Route::resource('sosial', SosiController::class);
Route::resource('infografis', InfoController::class);
Route::resource('bantuan', BantuController::class);

// login
Route::redirect('/auth/login', '/main/home');
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'processLogin']);
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'processRegister']);
});
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('main')->middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // Rangkaian Data
    Route::get('user/import', [UsersController::class, 'import'])->name('user.import');
    Route::post('/user/import', [UsersController::class, 'prosesimport'])
        ->name('proses.import');
    // profile
    Route::resource('profile', ProfileController::class);
    // data master
    Route::resource('user', UsersController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('role', RoleController::class);
    // data bantuan
    Route::resource('bantuan', BantuanController::class);
    Route::resource('infografis', InfografisController::class);

    // Dataset ekonomi
    Route::get('ekonomi/import', [EkonomiController::class, 'import'])->name('ekonomi.import');
    Route::post('/ekonomi/import', [EkonomiController::class, 'importekonomi'])
        ->name('import.ekonomi');
    Route::resource('ekonomi', EkonomiController::class);

    // kemiskinan
    Route::get('kemiskinan/import', [KemiskinanController::class, 'import'])->name('kemiskinan.import');
    Route::post('/kemiskinan/import', [KemiskinanController::class, 'importkemiskinan'])
        ->name('import.kemiskinan');
    Route::resource('kemiskinan', KemiskinanController::class);
    // kemiskinan
    Route::get('kependudukan/import', [KependudukanController::class, 'import'])->name('kependudukan.import');
    Route::post('/kependudukan/import', [KependudukanController::class, 'importkependudukan'])
        ->name('import.kependudukan');
    Route::resource('kependudukan', KependudukanController::class);
    // lingkungan hidup
    Route::get('lingkungan/import', [LingkunganHidupController::class, 'import'])->name('lingkungan.import');
    Route::post('/lingkungan/import', [LingkunganHidupController::class, 'importlingkungan'])
        ->name('import.lingkungan');
    Route::resource('lingkungan', LingkunganHidupController::class);
    // Pemerintahan
    Route::get('pemerintahan/import', [PemerintahanController::class, 'import'])->name('pemerintahan.import');
    Route::post('/pemerintahan/import', [PemerintahanController::class, 'importpemerintahan'])
        ->name('import.pemerintahan');
    Route::resource('pemerintahan', PemerintahanController::class);
    // pendidikan
    Route::get('pendidikan/import', [PendidikanController::class, 'import'])->name('pendidikan.import');
    Route::post('/pendidikan/import', [PendidikanController::class, 'importpendidikan'])
        ->name('import.pendidikan');
    Route::resource('pendidikan', PendidikanController::class);
    // sosial
    Route::get('sosial/import', [SosialController::class, 'import'])->name('sosial.import');
    Route::post('/sosial/import', [SosialController::class, 'importsosial'])
        ->name('import.sosial');
    Route::resource('sosial', SosialController::class);

    Route::resource('footer', FooterController::class);
    Route::resource('pengingat', PengingatController::class);
});
