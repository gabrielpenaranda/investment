<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\system\portal\InvestmentController;
use App\Http\Controllers\system\portal\AccountStatementController;
use App\Http\Controllers\system\portal\TaxController;
/* use App\Http\Controllers\system\portal\InterestController;
use App\Http\Controllers\system\portal\PaymentController; */


Route::get('dashboard', function(){
        return view('system.portal.dashboard');
    })
    ->middleware(['auth', 'verified'])
    ->middleware('can:portal.dashboard')
    ->name('portal.dashboard');


Route::prefix('investments')->group(function() {
    Route::get('index', [InvestmentController::class, 'index'])->middleware('can:portal.investments.index')->name('portal.investments.index');
    Route::get('show/{investment}', [InvestmentController::class, 'show'])->middleware('can:portal.investments.show')->name('portal.investments.show');
});

Route::prefix('interests')->group(function() {
    Route::get('index', [InterestController::class, 'index'])->middleware('can:portal.interests.index')->name('portal.interests.index');
    Route::get('index/{interest}', [InterestController::class, 'show'])->middleware('can:portal.interests.show')->name('portal.interests.show');
});

Route::prefix('taxes')->group(function() {
    Route::get('index', [TaxController::class, 'index'])->middleware('can:portal.taxes.index')->name('portal.taxes.index');
    Route::get('show/{tax}', [TaxController::class, 'show'])->middleware('can:portal.taxes.show')->name('portal.taxes.show');
    Route::get('print/{tax}', [TaxController::class, 'print'])->middleware('can:portal.taxes.print')->name('portal.taxes.print');
});

Route::prefix('account_statements')->group(function() {
    Route::get('index/{investment}', [AccountStatementController::class, 'index'])->middleware('can:portal.account-statements.index')->name('portal.account-statements.index');
    Route::get('print/{investment}', [AccountStatementController::class, 'print'])->middleware('can:portal.account-statements.print')->name('portal.account-statements.print');
    Route::get('view/{investment}', [AccountStatementController::class, 'view'])->middleware('can:portal.account-statements.view')->name('portal.account-statements.view');
});

Route::prefix('payments')->group(function() {
    Route::get('index', [PaymentController::class, 'index'])->middleware('can:portal.payments.index')->name('portal.payments.index');
});