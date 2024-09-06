<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\RekeningController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpananController;


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

// Route::get('/', function () {
//     return view('pages.home');
// });

// Route::get('/',function(){
//     return view('pages.admin')
// });

Route::get('/',function(){
    return view('pages.auth.login');
});



Route::resource('simpanan', SimpananController::class);
Route::resource('pinjaman', PinjamanController::class);
Route::resource('nasabah',NasabahController::class);
Route::resource('rekening',RekeningController::class);
Route::resource('admin',AdminController::class);
Route::resource('keuangan',KeuanganController::class);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


// Route::middleware(['auth','role:admin'])->group(function(){
// // Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Route::get('admin/dashboard',function(){
//     return
// });
// });


Route::get('admin/dashboard', [AdminController::class, 'index'])->name('adminHome');
Route::middleware('auth')->group(function(){
});

// Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
// Route::get('/user/dashboard', [AdminController::class, 'dashboard'])->name('admin.user')->middleware('auth');
