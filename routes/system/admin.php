<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\system\ProductController;
use App\Http\Controllers\system\InvestmentController;
use App\Http\Controllers\system\InterestController;
use App\Http\Controllers\system\WithdrawalController;
use App\Http\Controllers\system\TaxController;

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->middleware('can:admin.dashboard')->name('admin.dashboard');

Route::prefix('products')->group(function() {
    Route::get('index', [ProductController::class, 'index'])->middleware('can:admin.products.index')->name('admin.products.index');
    Route::get('create', [ProductController::class, 'create'])->middleware('can:admin.products.create')->name('admin.products.create');
    Route::post('store', [ProductController::class, 'store'])->middleware('can:admin.products.create')->name('admin.products.store');
    Route::get('edit/{product}', [ProductController::class, 'edit'])->middleware('can:admin.products.edit')->name('admin.products.edit');
    Route::put('update/{product}', [ProductController::class, 'update'])->middleware('can:admin.products.edit')->name('admin.products.update');
    Route::delete('destroy/{product}', [ProductController::class, 'destroy'])->middleware('can:admin.products.destroy')->name('admin.products.destroy');
});

Route::prefix('investments')->group(function() {
    Route::get('index', [InvestmentController::class, 'index'])->middleware('can:admin.investments.index')->name('admin.investments.index');
    Route::get('create', [InvestmentController::class, 'create'])->middleware('can:admin.investments.create')->name('admin.investments.create');
    Route::post('store', [InvestmentController::class, 'store'])->middleware('can:admin.investments.create')->name('admin.investments.store');
    Route::get('edit/{investment}', [InvestmentController::class, 'edit'])->middleware('can:admin.investments.edit')->name('admin.investments.edit');
    Route::put('update/{investment}', [InvestmentController::class, 'update'])->middleware('can:admin.investments.edit')->name('admin.investments.update');
    Route::delete('destroy/{investment}', [InvestmentController::class, 'destroy'])->middleware('can:admin.investments.destroy')->name('admin.investments.destroy');
});

Route::prefix('interests')->group(function() {
    Route::get('index', [InterestController::class, 'index'])->middleware('can:admin.interests.index')->name('admin.interests.index');
    Route::get('create', [InterestController::class, 'create'])->middleware('can:admin.interests.create')->name('admin.interests.create');
    Route::post('store', [InterestController::class, 'store'])->middleware('can:admin.interests.create')->name('admin.interests.store');
    Route::get('edit/{interest}', [InterestController::class, 'edit'])->middleware('can:admin.interests.edit')->name('admin.interests.edit');
    Route::put('update/{interest}', [InterestController::class, 'update'])->middleware('can:admin.interests.edit')->name('admin.interests.update');
    Route::delete('destroy/{interest}', [InterestController::class, 'destroy'])->middleware('can:admin.interests.destroy')->name('admin.interests.destroy');
});

Route::prefix('taxes')->group(function() {
    Route::get('index', [TaxController::class, 'index'])->middleware('can:admin.taxes.index')->name('admin.taxes.index');
    Route::get('create', [TaxController::class, 'create'])->middleware('can:admin.taxes.create')->name('admin.taxes.create');
    Route::post('store', [TaxController::class, 'store'])->middleware('can:admin.taxes.create')->name('admin.taxes.store');
    Route::get('edit/{tax}', [TaxController::class, 'edit'])->middleware('can:admin.taxes.edit')->name('admin.taxes.edit');
    Route::put('update/{tax}', [TaxController::class, 'update'])->middleware('can:admin.taxes.edit')->name('admin.taxes.update');
    Route::delete('destroy/{tax}', [TaxController::class, 'destroy'])->middleware('can:admin.taxes.destroy')->name('admin.taxes.destroy');
});

Route::prefix('withdrawals')->group(function() {
    Route::get('index', [WithdrawalController::class, 'index'])->middleware('can:admin.withdrawals.index')->name('admin.withdrawals.index');
    Route::get('create', [WithdrawalController::class, 'create'])->middleware('can:admin.withdrawals.create')->name('admin.withdrawals.create');
    Route::post('store', [WithdrawalController::class, 'store'])->middleware('can:admin.withdrawals.create')->name('admin.withdrawals.store');
    Route::get('edit/{withdrawal}', [WithdrawalController::class, 'edit'])->middleware('can:admin.withdrawals.edit')->name('admin.withdrawals.edit');
    Route::put('update/{withdrawal}', [WithdrawalController::class, 'update'])->middleware('can:admin.withdrawals.edit')->name('admin.withdrawals.update');
    Route::delete('destroy/{withdrawal}', [WithdrawalController::class, 'destroy'])->middleware('can:admin.withdrawals.destroy')->name('admin.withdrawals.destroy');
});