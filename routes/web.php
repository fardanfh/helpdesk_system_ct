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

// Landing (home) page — use the sliced landing template and provide dropdown data for the report form
use App\Models\Lokasi;
use App\Models\Area;
use App\Models\Permasalahan;

Route::get('/', function () {
    $lokasis = Lokasi::orderBy('nama_lokasi')->get();
    $areas = Area::orderBy('nama_area')->get();
    $permasalahans = Permasalahan::orderBy('nama_permasalahan')->get();
    return view('landing.index', compact('lokasis', 'areas', 'permasalahans'));
})->name('home');

// Preview the raw Able Pro landing template converted to Blade
Route::get('/able-landing', function () {
    return view('admin_template.index');
})->name('able.landing');


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PermasalahanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PriorityController;

// Track and print endpoints used by landing page
Route::get('/track-laporan/{no_laporan}', [LaporanController::class, 'track'])->name('laporans.track');
Route::get('/laporan/print/{id}', [LaporanController::class, 'print'])->name('laporans.print');


// Authentication routes (simple session-based admin login)
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// (PIC users can use the same admin login form; no separate PIC login routes)

// Dashboard (admin) — keep the dashboard route pointing to HomeController@index and protected by admin middleware
Route::get('/home', function () {
    // keep /home for backward compatibility but point to landing as well
    return view('landing.index');
});
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('pic');

// Resource routes
Route::resource('admins', AdminController::class);
Route::resource('pics', PicController::class);
Route::resource('jabatan', JabatanController::class);
Route::resource('lokasis', LokasiController::class);
Route::resource('areas', AreaController::class);
Route::resource('permasalahans', PermasalahanController::class);
Route::resource('laporans', LaporanController::class);
Route::resource('status', StatusController::class);
Route::resource('priority', PriorityController::class);

Route::middleware(['admin'])->group(function () {
    Route::resource('admins', AdminController::class);
    Route::resource('pics', PicController::class);
});

Route::middleware(['pic'])->group(function () {
    Route::resource('laporans', LaporanController::class)->only(['index', 'show', 'update']);
});
