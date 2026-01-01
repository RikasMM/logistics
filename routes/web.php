<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/orders', App\Http\Controllers\OrderController::class)->name('orders.index');
    Route::get('/shipments', App\Http\Controllers\ShipmentController::class)->name('shipments.index');
    
    // Inventory
    Route::get('/inventory', App\Http\Controllers\InventoryController::class)->name('inventory.index');
    Route::get('/incoming-stock', App\Http\Controllers\IncomingStockController::class)->name('incoming-stock.index');
    Route::get('/outgoing-stock', App\Http\Controllers\OutgoingStockController::class)->name('outgoing-stock.index');
    Route::get('/stock-adjustments', App\Http\Controllers\StockAdjustmentController::class)->name('stock-adjustments.index');
    
    // Administration
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::patch('/users/{user}/toggle-status', [App\Http\Controllers\UserController::class, 'toggleStatus'])->name('users.toggle-status');
    Route::get('/branches', App\Http\Controllers\BranchController::class)->name('branches.index');
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('/permissions', App\Http\Controllers\PermissionController::class)->name('permissions.index');
    Route::get('/reports', App\Http\Controllers\ReportController::class)->name('reports.index');
    Route::get('/settings', App\Http\Controllers\SettingController::class)->name('settings.index');
});
