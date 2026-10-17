<?php

use App\Http\Controllers\Admin\AthleteController;
use App\Http\Controllers\Admin\CheerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MedalController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ScheduleController;
use Illuminate\Support\Facades\Route;

// Redirect root to admin dashboard
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Admin Panel Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Medals (Entri, Edit, Update, Destroy)
    Route::get('/medals', [MedalController::class, 'index'])->name('medals.index');
    Route::get('/medals/create', [MedalController::class, 'create'])->name('medals.create');
    Route::post('/medals', [MedalController::class, 'store'])->name('medals.store');
    Route::get('/medals/{id}/edit', [MedalController::class, 'edit'])->name('medals.edit');
    Route::put('/medals/{id}', [MedalController::class, 'update'])->name('medals.update');
    Route::delete('/medals/{id}', [MedalController::class, 'destroy'])->name('medals.destroy');

    // News CMS
    Route::resource('news', NewsController::class);

    // Athletes CRUD & Verification
    Route::get('/athletes', [AthleteController::class, 'index'])->name('athletes.index');
    Route::get('/athletes/create', [AthleteController::class, 'create'])->name('athletes.create');
    Route::post('/athletes', [AthleteController::class, 'store'])->name('athletes.store');
    Route::get('/athletes/{id}/edit', [AthleteController::class, 'edit'])->name('athletes.edit');
    Route::put('/athletes/{id}', [AthleteController::class, 'update'])->name('athletes.update');
    Route::delete('/athletes/{id}', [AthleteController::class, 'destroy'])->name('athletes.destroy');
    Route::post('/athletes/{id}/toggle-verify', [AthleteController::class, 'toggleVerify'])->name('athletes.toggle-verify');

    // Schedules & Matches Result Entry
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::get('/schedules/{id}/result', [ScheduleController::class, 'editResult'])->name('schedules.edit-result');
    Route::post('/schedules/{id}/result', [ScheduleController::class, 'updateResult'])->name('schedules.update-result');
    Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

    // Supporter Cheers Moderation
    Route::get('/cheers', [CheerController::class, 'index'])->name('cheers.index');
    Route::post('/cheers/{id}/toggle', [CheerController::class, 'toggleApprove'])->name('cheers.toggle');
    Route::delete('/cheers/{id}', [CheerController::class, 'destroy'])->name('cheers.destroy');
});
