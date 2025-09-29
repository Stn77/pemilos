<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('auth.Login');
})->middleware('guest')->name('loginPage');

Route::post('/lgn-bts', [AuthController::class, 'Login'])->name('login-submit');

Route::middleware(['auth','admin'])->controller(AdminController::class)->group(function(){
    // Route::post('/ekasd/{id}', 'updateKandidat');
});


Route::get('/Dashboard', 'dashboardAdmin')->name('admin.dasboard');
Route::get('/dashboard/peserta', 'dashboardAdminPeserta')->name('admin.dasboard.peserta');
Route::get('/dashboard/chart', 'dashboardAdminChartPemilihan')->name('admin.dasboard.chart');
Route::get('/dashboard/kandidat', 'dashboardAdminKandidat')->name('admin.dasboard.kandidat');
Route::get('/eka/{id}', 'editKandidat')->name('editKandidat')->middleware(['auth', 'admin']);

// Volt::route('data', 'datapeserta');

Route::get('/iok', function(){
    return view('admin.AdmDashAddKandidat');
});

Route::controller(UserController::class)->group(function (){

});

Route::middleware(['auth','peserta', 'vote'])->controller(PageController::class)->group(function (){
    Route::get('/vote', 'votePage')->name('votePage');
});

Route::get('/telah-vote', [PageController::class, 'voteTrue'])->name('voteTrue');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
