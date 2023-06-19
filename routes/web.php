<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\SuplaiController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopController;

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
    return view('landing-page/home');
});

Route::get('/home', function () {
    return view('landing-page/home');
});

Route::get('/about', function() {
	return view('landing-page/about');
});

Route::get('/doctors', function() {
	return view('landing-page/doctors');
});

Route::get('/services', function() {
	return view('landing-page/service');
});

Route::get('/departement', function() {
	return view('landing-page/departement');
});

Route::get('/article', function() {
	return view('landing-page/article');
});

Route::get('/administrator', function () {
    return view('admin.home');
});



Route::resource('obat',ObatController::class);
Route::resource('kategori_obat',KategoriController::class);
Route::resource('suplier',SuplierController::class);
Route::resource('suplai_obat',SuplaiController::class);
Route::resource('dokter',DokterController::class);
Route::resource('pemeriksaan',PemeriksaanController::class);
Route::resource('pasien',PasienController::class);
Route::resource('resep_obat',ResepController::class);

Route::get('shop',[ShopController::class, 'index']);
Route::get('shop/{id}',[ShopController::class, 'show']);

Route::get('kategori-edit/{id}',[KategoriController::class, 'edit']);
Route::get('obat-edit/{id}',[ObatController::class, 'edit']);
Route::get('suplier-edit/{id}',[SuplierController::class, 'edit']);
Route::get('suplai_obat-edit/{id}',[SuplaiController::class, 'edit']);
Route::get('dokter-edit/{id}',[DokterController::class, 'edit']);
Route::get('pemeriksaan-edit/{id}',[PemeriksaanController::class, 'edit']);
Route::get('pasien-edit/{id}',[PasienController::class, 'edit']);
Route::get('resep_obat-edit/{id}',[ResepController::class, 'edit']);

Route::get('/api-obat', [ObatController::class, 'apiObat']);
Route::get('/api-obat/{id}', [ObatController::class, 'apiObatDetail']);
Route::get('/api-pemeriksaan', [PemeriksaanController::class, 'apiPemeriksaan']);

// Export to PDF
Route::get('pasien-pdf', [PasienController::class,'pasienPDF']);
Route::get('dokter-pdf', [DokterController::class,'dokterPDF']);
Route::get('obat-pdf', [ObatController::class,'obatPDF']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index'])->middleware('auth');
