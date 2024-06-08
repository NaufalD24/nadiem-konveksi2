<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Models\transaction;

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

Route::get('/', function () {
    return view('welcome');
});


// Route Transaction
// Rute untuk Admin
Route::get('admin', [AdminController::class, 'index'])->name('admin.index'); // Read all
Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create'); // Show create form
Route::post('admin', [AdminController::class, 'store'])->name('admin.store'); // Store new admin
Route::get('admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit'); // Show edit form
Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.update'); // Update admin
Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy'); // Delete admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Rute untuk Transaction
Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index'); // Read all
Route::get('transaction/create', [TransactionController::class, 'create'])->name('transaction.create'); // Show create form
Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.store'); // Store new transaction
Route::get('transaction/{id}/edit', [TransactionController::class, 'edit'])->name('transaction.edit'); // Show edit form
Route::put('transaction/{id}', [TransactionController::class, 'update'])->name('transaction.update'); // Update transaction
Route::delete('transaction/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy'); // Delete transaction
Route::get('transaction/print', [TransactionController::class, 'print'])->name('transaction.print');
