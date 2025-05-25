<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboards\DashboardController;
use App\Http\Controllers\dashboards\MonteurDashboardController;
use App\Http\Controllers\dashboards\InkoperDashboardController;
use App\Http\Controllers\VehiclesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// All authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Routes for monteur, planner, and klant
    Route::middleware(['role:monteur,planner,klant'])->group(function () {
        Route::get('/vehicles', [VehiclesController::class, 'index'])->name('vehicles');
        Route::get('/vehicles/{id}/show', [VehiclesController::class, 'show'])->name('vehicle.show');
    });

    // Monteur routes
    Route::middleware(['role:monteur'])->prefix('monteur')->name('monteur.')->group(function () {
        Route::get('/chassis', [MonteurDashboardController::class, 'index'])->name('chassis.get');
        Route::post('/chassis', [MonteurDashboardController::class, 'chassis'])->name('chassis');
        Route::post('/store', [MonteurDashboardController::class, 'store'])->name('store');
    });

    // Inkoper routes
    Route::middleware(['role:inkoper'])->prefix('inkoper')->group(function () {
        // Chassis routes
        Route::post('/chassis', [InkoperDashboardController::class, 'chassisNew'])->name('chassis.new');
        Route::put('/{id}/chassis', [InkoperDashboardController::class, 'chassisUpdate'])->name('chassis.update');
        Route::post('/{id}/chassis', [InkoperDashboardController::class, 'chassisDeleteOrRestore'])->name('chassis.deleteorrestore');

        // Drives routes
        Route::post('/drives', [InkoperDashboardController::class, 'drivesNew'])->name('drives.new');
        Route::put('/{id}/drives', [InkoperDashboardController::class, 'drivesUpdate'])->name('drives.update');
        Route::post('/{id}/drives', [InkoperDashboardController::class, 'drivesDeleteOrRestore'])->name('drives.deleteorrestore');

        // Seats routes
        Route::post('/seats', [InkoperDashboardController::class, 'seatsNew'])->name('seats.new');
        Route::put('/{id}/seats', [InkoperDashboardController::class, 'seatsUpdate'])->name('seats.update');
        Route::post('/{id}/seats', [InkoperDashboardController::class, 'seatsDeleteOrRestore'])->name('seats.deleteorrestore');

        // Steering wheels routes
        Route::post('/steeringWheels', [InkoperDashboardController::class, 'steeringWheelsNew'])->name('steeringWheels.new');
        Route::put('/{id}/steeringWheels', [InkoperDashboardController::class, 'steeringWheelsUpdate'])->name('steeringWheels.update');
        Route::post('/{id}/steeringWheels', [InkoperDashboardController::class, 'steeringWheelsDeleteOrRestore'])->name('steeringWheels.deleteorrestore');

        // Wheels routes
        Route::post('/wheels', [InkoperDashboardController::class, 'wheelsNew'])->name('wheels.new');
        Route::put('/{id}/wheels', [InkoperDashboardController::class, 'wheelsUpdate'])->name('wheels.update');
        Route::post('/{id}/wheels', [InkoperDashboardController::class, 'wheelsDeleteOrRestore'])->name('wheels.deleteorrestore');

        // Suitable chassis routes
        Route::post('/suitableChassis', [InkoperDashboardController::class, 'suitableChassisNew'])->name('suitableChassis.new');
        Route::put('/{id}/suitableChassis', [InkoperDashboardController::class, 'suitableChassisUpdate'])->name('suitableChassis.update');
        Route::post('/{id}/suitableChassis', [InkoperDashboardController::class, 'suitableChassisDeleteOrRestore'])->name('suitableChassis.deleteorrestore');
    });

    // Profile routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
