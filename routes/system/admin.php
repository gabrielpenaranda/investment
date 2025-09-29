<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\system\CountryController;
use App\Http\Controllers\system\StateController;
use App\Http\Controllers\system\ProductController;
use App\Http\Controllers\system\InvestmentController;
use App\Http\Controllers\system\InvestmentArchiveController;
use App\Http\Controllers\system\InterestController;
use App\Http\Controllers\system\AccountStatementController;
use App\Http\Controllers\system\TaxController;
use App\Http\Controllers\system\ReportController;
use App\Http\Controllers\system\PaymentController;
use App\Http\Controllers\system\UserController;

/* Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->middleware('can:admin.dashboard')->name('admin.dashboard'); */

Route::get('dashboard', function(){
        return view('system.admin.dashboard');
    })
    ->middleware(['auth', 'verified'])
    ->middleware('can:admin.dashboard')
    ->name('admin.dashboard');


Route::prefix('countries')->group(function() {
    Route::get('index', [CountryController::class, 'index'])->middleware('can:admin.countries.index')->name('admin.countries.index');
    Route::get('create', [CountryController::class, 'create'])->middleware('can:admin.countries.create')->name('admin.countries.create');
    Route::post('store', [CountryController::class, 'store'])->middleware('can:admin.countries.create')->name('admin.countries.store');
    Route::get('edit/{country}', [CountryController::class, 'edit'])->middleware('can:admin.countries.edit')->name('admin.countries.edit');
    Route::put('update/{country}', [CountryController::class, 'update'])->middleware('can:admin.countries.edit')->name('admin.countries.update');
    Route::delete('destroy/{country}', [CountryController::class, 'destroy'])->middleware('can:admin.countries.destroy')->name('admin.countries.destroy');
});

Route::prefix('states')->group(function() {
    Route::get('index', [StateController::class, 'index'])->middleware('can:admin.states.index')->name('admin.states.index');
    Route::get('create', [StateController::class, 'create'])->middleware('can:admin.states.create')->name('admin.states.create');
    Route::post('store', [StateController::class, 'store'])->middleware('can:admin.states.create')->name('admin.states.store');
    Route::get('edit/{state}', [StateController::class, 'edit'])->middleware('can:admin.states.edit')->name('admin.states.edit');
    Route::put('update/{state}', [StateController::class, 'update'])->middleware('can:admin.states.edit')->name('admin.states.update');
    Route::delete('destroy/{state}', [StateController::class, 'destroy'])->middleware('can:admin.states.destroy')->name('admin.states.destroy');
});

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
    Route::get('show/{investment}', [InvestmentController::class, 'show'])->middleware('can:admin.investments.show')->name('admin.investments.show');
    Route::get('edit/{investment}', [InvestmentController::class, 'edit'])->middleware('can:admin.investments.edit')->name('admin.investments.edit');
    Route::put('update/{investment}', [InvestmentController::class, 'update'])->middleware('can:admin.investments.edit')->name('admin.investments.update');
    Route::delete('destroy/{investment}', [InvestmentController::class, 'destroy'])->middleware('can:admin.investments.destroy')->name('admin.investments.destroy');
    Route::get('close/{investment}', [InvestmentController::class, 'close'])->middleware('can:admin.investments.destroy')->name('admin.investments.close');
});

Route::prefix('interests')->group(function() {
    Route::get('index', [InterestController::class, 'index'])->middleware('can:admin.interests.index')->name('admin.interests.index');
    Route::get('index/{interest}', [InterestController::class, 'show'])->middleware('can:admin.interests.show')->name('admin.interests.show');
    Route::get('generate/{interestMonth}', [InterestController::class, 'generate'])->middleware('can:admin.interests.generate')->name('admin.interests.generate');
    Route::get('approve/{interestMonth}', [InterestController::class, 'approve'])->middleware('can:admin.interests.approve')->name('admin.interests.approve');
    Route::get('rollback', [InterestController::class, 'rollback'])->middleware('can:admin.interests.rollback')->name('admin.interests.rollback');
    Route::get('payall', [InterestController::class, 'payall'])->middleware('can:admin.interests.pay')->name('admin.interests.payall');
    Route::get('pay/{interest}', [InterestController::class, 'pay'])->middleware('can:admin.interests.pay')->name('admin.interests.pay');
});

Route::prefix('taxes')->group(function() {
    Route::get('index', [TaxController::class, 'index'])->middleware('can:admin.taxes.index')->name('admin.taxes.index');
    Route::get('create', [TaxController::class, 'create'])->middleware('can:admin.taxes.create')->name('admin.taxes.create');
    Route::post('store', [TaxController::class, 'store'])->middleware('can:admin.taxes.create')->name('admin.taxes.store');
    Route::get('show/{tax}', [TaxController::class, 'show'])->middleware('can:admin.taxes.show')->name('admin.taxes.show');
    Route::get('edit/{tax}', [TaxController::class, 'edit'])->middleware('can:admin.taxes.edit')->name('admin.taxes.edit');
    Route::put('update/{tax}', [TaxController::class, 'update'])->middleware('can:admin.taxes.edit')->name('admin.taxes.update');
    Route::delete('destroy/{tax}', [TaxController::class, 'destroy'])->middleware('can:admin.taxes.destroy')->name('admin.taxes.destroy');
    Route::get('print/{tax}', [TaxController::class, 'print'])->middleware('can:admin.taxes.print')->name('admin.taxes.print');
});

Route::prefix('reports')->group(function() {
    Route::get('index', [ReportController::class, 'index'])->middleware('can:admin.reports.index')->name('admin.reports.index');
    Route::get('create', [ReportController::class, 'create'])->middleware('can:admin.reports.create')->name('admin.reports.create');
    Route::post('store', [ReportController::class, 'store'])->middleware('can:admin.reports.create')->name('admin.reports.store');
    Route::get('show/{report}', [ReportController::class, 'show'])->middleware('can:admin.reports.show')->name('admin.reports.show');
    Route::get('edit/{report}', [ReportController::class, 'edit'])->middleware('can:admin.reports.edit')->name('admin.reports.edit');
    Route::put('update/{report}', [ReportController::class, 'update'])->middleware('can:admin.reports.edit')->name('admin.reports.update');
    Route::delete('destroy/{report}', [ReportController::class, 'destroy'])->middleware('can:admin.reports.destroy')->name('admin.reports.destroy');
    Route::get('print/{report}', [ReportController::class, 'print'])->middleware('can:admin.reports.print')->name('admin.reports.print');
});


Route::prefix('investment_archives')->group(function() {
    Route::get('index', [InvestmentArchiveController::class, 'index'])->middleware('can:admin.investmentarchives.index')->name('admin.investmentarchives.index');
    Route::get('show/{investmentArchive}', [InvestmentArchiveController::class, 'show'])->middleware('can:admin.investmentarchives.show')->name('admin.investmentarchives.show');
});

Route::prefix('account_statements')->group(function() {
    Route::get('index/{investment}', [AccountStatementController::class, 'index'])->middleware('can:admin.account-statements.index')->name('admin.account-statements.index');
    Route::get('print/{investment}', [AccountStatementController::class, 'print'])->middleware('can:admin.account-statements.print')->name('admin.account-statements.print');
});

Route::prefix('payments')->group(function() {
    Route::get('index', [PaymentController::class, 'index'])->middleware('can:admin.payments.index')->name('admin.payments.index');
});

Route::prefix('users')->group(function() {
    Route::get('index', [UserController::class, 'index'])->middleware('can:admin.users.index')->name('admin.users.index');
    Route::get('create', [UserController::class, 'create'])->middleware('can:admin.users.create')->name('admin.users.create');
    Route::post('store', [UserController::class, 'store'])->middleware('can:admin.users.create')->name('admin.users.store');
    Route::get('show/{user}', [UserController::class, 'show'])->middleware('can:admin.users.show')->name('admin.users.show');
    Route::get('edit/{user}', [UserController::class, 'edit'])->middleware('can:admin.users.edit')->name('admin.users.edit');
    Route::put('update/{user}', [UserController::class, 'update'])->middleware('can:admin.users.edit')->name('admin.users.update');
    Route::delete('destroy/{user}', [UserController::class, 'destroy'])->middleware('can:admin.users.destroy')->name('admin.users.destroy');
});