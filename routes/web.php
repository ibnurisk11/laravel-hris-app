<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserAttendanceController;
use App\Http\Controllers\AdminAttendanceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\DashboardController;

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

// Rute untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman login dan logout
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rute untuk pengguna yang sudah login (Authenticated User)
Route::middleware(['auth'])->group(function () {
    // Dashboard, dapat diakses oleh user maupun admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute Khusus User
    // Halaman utama absen
    Route::get('/absen', [UserAttendanceController::class, 'index'])->name('user.absen');
    
    // Rute untuk proses check-in dan check-out
    // Nama rute disesuaikan dengan yang dipanggil di view
    Route::post('/absen/checkin', [UserAttendanceController::class, 'checkIn'])->name('user.absen.checkin');
    Route::post('/absen/checkout', [UserAttendanceController::class, 'checkOut'])->name('user.absen.checkout');
});


// Rute Khusus Admin
// Dikelompokkan dengan prefix 'admin' dan middleware 'role:admin'
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Pengelolaan Users
    Route::resource('users', UserController::class);

    // Pengelolaan Divisions
    Route::resource('divisions', DivisionController::class);

    // Pengelolaan Absensi (Admin)
    Route::resource('attendances', AdminAttendanceController::class);

    // Pengelolaan Gaji
    Route::resource('salaries', SalaryController::class);
});
