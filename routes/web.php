<?php

use Illuminate\Support\Facades\Route;

// controller 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;

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
Route::middleware('guest')->group(function(){
    // Login 
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    // Portfolio
    Route::get('/', function () {
        return view('portfolio-pages.home', [
            "title"  => "Home"
        ]);
    });
    Route::get('/about', function () {
        return view('portfolio-pages.about', [
            "title"  => "About"
        ]);
    });
    Route::get('/project', function () {
        return view('portfolio-pages.projects', [
            "title"  => "Project"
        ]);
    });
    Route::get('/contact', function () {
        return view('portfolio-pages.contact', [
            "title"  => "Home"
        ]);
    });
});
Route::middleware('auth')->group(function(){  
    // Main Page
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::resource('dashboard', DashboardController::class);
    // Siswa
    Route::resource('mastersiswa', SiswaController::class);
    Route::get('mastersiswa/{id}/hapus', [SiswaController::class, 'hapus'])->name('mastersiswa.hapus');
    // Project
    Route::resource('masterproject', ProjectController::class);
    Route::get('masterproject/{id}/tambah', [ProjectController::class, 'tambah'])->name('masterproject.tambah');
    Route::resource('masterkontak', KontakController::class);
});
