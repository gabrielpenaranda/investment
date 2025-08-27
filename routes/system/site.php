<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;




Route::get('/', function () {
    return view('system.home');
})->name('home');

Route::get('/language/{language}', function($language) {
    if (in_array($language, ['en', 'es'])) {
        App::setLocale($language);
        session()->put('locale', $language);
    }

    return redirect()->back();
})->name('language');