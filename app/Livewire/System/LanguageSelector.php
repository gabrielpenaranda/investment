<?php

namespace App\Livewire\System;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSelector extends Component
{
    public $language;

    public function mount()
    {
        // Inicializa con el idioma actual de la sesión
        $this->language = Session::get('locale', config('app.locale'));
    }

    public function updatedLanguage($value)
    {
        // Cambia el idioma en la aplicación y en la sesión
        App::setLocale($value);
        Session::put('locale', $value);

        // Opcional: Dispara un evento para que otros componentes se actualicen
        /* $this->dispatch('localeChanged', locale: $value); */
        $this->redirect(request()->header('Referer') ?? '/');
    }

    public function render()
    {
        return view('livewire.system.language-selector');
    }
}