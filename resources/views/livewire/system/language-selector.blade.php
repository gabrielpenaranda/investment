<div>
    <div class="w-full flex">
        <label hidden for="language">Language</label>
        <select wire:model.live="language" name="language" class="form-select">
            <option value="en">🇺🇸 {{ __('language.english') }}</option>
            {{-- <option value="es">🇪🇸 {{ __('language.spanish') }}</option> --}}
            <option value="es">🇲🇽 {{ __('language.spanish') }}</option>
        </select>
    </div>
    {{-- <div class="flex space-x-2">
        <button type="button" wire:click="$set('language', 'es')" class="text-sm {{ $language == 'es' ? 'font-bold' : 'text-gray-600' }}">🇪🇸 {{ __('language.spanish') }}</button>
        <button type="button" wire:click="$set('language', 'en')" class="text-sm {{ $language == 'en' ? 'font-bold' : 'text-gray-600' }}">🇬🇧 {{ __('language.english') }}</button>
    </div> --}}
</div>
