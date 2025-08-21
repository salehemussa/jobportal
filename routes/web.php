<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VacanceController;
use App\Http\Controllers\ApplicationController;

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Protected Route
Route::middleware(['auth'])->group(function(){

    Route::middleware(['role:admin'])->group(function(){
        Route::get('/admin/vacances', [VacanceController::class, 'indexAdmin'])->name('admin.vacances.index');
        Route::get('/admin/vacances/create', [VacanceController::class, 'create'])->name('admin.vacances.create');
        Route::post('/admin/vacances/store', [VacanceController::class, 'store'])->name('admin.vacances.store');
        Route::get('/admin/vacances/edit/{id}', [VacanceController::class, 'edit'])->name('admin.vacances.edit');
        Route::put('/admin/vacances/{id}', [VacanceController::class, 'update'])->name('admin.vacances.update');    
        Route::delete('/admin/vacances/{id}', [VacanceController::class, 'destroy'])->name('admin.vacances.destroy');
        Route::post('/admin/vacances/{id}/toggle-status', [VacanceController::class, 'toggleStatus'])->name('admin.vacances.toggleStatus');
        Route::get('/admin/applications', [ApplicationController::class, 'indexAdmin'])->name('admin.applications.index');
        Route::get('/applications/download/{application}', [ApplicationController::class, 'download'])->name('applications.download');
        Route::get('/admin/vacances/report', [ApplicationController::class, 'generatePDF'])->name('admin.applications.report');
    });
    
    Route::middleware(['role:user'])->group(function(){
        Route::get('/user/vacances', [VacanceController::class, 'indexUser'])->name('user.vacances.index');
        Route::post('/user/vacances/{vacance}', [ApplicationController::class, 'storeUser'])->name('apply');
        Route::get('/user/applications', [ApplicationController::class, 'indexUser'])->name('user.applications.index');
        Route::get('/user/applications/download/{application}', [ApplicationController::class, 'downloadUser'])->name('user.applications.download');
    });
    
 });

require __DIR__.'/api.php';