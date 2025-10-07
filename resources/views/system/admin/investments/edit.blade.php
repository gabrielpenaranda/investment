
<x-layouts.admin>


    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.investments.index') }}">
                {{ __('messages.Investments') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Edit') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.investments.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.Edit Investment') }}</p>
        <form action="{{ route('admin.investments.update', $investment) }}" method="POST">
            @csrf
            @method('PUT')

            <flux:label class="mt-2!">{{ __('messages.Serial') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $investment->serial }}
            </p>

            <flux:label class="mt-2!">{{ __('messages.Client') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $investment->name }}
            </p>

            <flux:label class="mt-2!">{{ __('messages.Product') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $investment->product->name }}
            </p>

            <input type="hidden" name="investment_id" value="{{ $investment->id }}">
            
            <input type="hidden" name="product_id" value="{{ $investment->product_id }}">

            @php
                $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::DECIMAL);
                $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 2);
            @endphp

           

            <flux:label class="mt-2!">{{ __('messages.Investment Amount') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $formatter->format($investment->investment_amount) }}
            </p>

            <flux:label class="mt-2!">{{ __('messages.Investment Amount Change') }}</flux:label>


            <div x-data="{ amountChange: '{{ old('amount_change', 2) }}' }">
                <!-- Grupo de botones de radio para seleccionar Incremento, Retiro o No Modify -->
                <div class="mt-0">
                    <!-- Input oculto: valor por defecto cuando no se selecciona ninguna opción -->
                    <input type="hidden" name="amount_change" x-model="amountChange">

                    <!-- Botón de radio para Incremento -->
                    <label class="inline-flex items-center mr-6">
                        <input 
                            type="radio" 
                            name="amount_change" 
                            value="1" 
                            x-model="amountChange"
                            class="rounded border-gray-300 text-zinc-600 shadow-sm"
                        >
                        <span class="ml-2 text-sm text-zinc-700">{{ __('messages.Increment') }}</span>
                    </label>

                    <!-- Botón de radio para Retiro -->
                    <label class="inline-flex items-center mr-6">
                        <input 
                            type="radio" 
                            name="amount_change" 
                            value="0" 
                            x-model="amountChange"
                            class="rounded border-gray-300 text-zinc-600 shadow-sm"
                        >
                        <span class="ml-2 text-sm text-zinc-700">{{ __('messages.Withdrawal') }}</span>
                    </label>

                    <!-- Botón de radio para No Modify -->
                    <label class="inline-flex items-center">
                        <input 
                            type="radio" 
                            name="amount_change" 
                            value="2" 
                            x-model="amountChange"
                            class="rounded border-gray-300 text-zinc-600 shadow-sm"
                        >
                        <span class="ml-2 text-sm text-zinc-700">{{ __('messages.No Modify') }}</span>
                    </label>
                </div>

                <!-- Mensajes de error -->
                <flux:error name="amount_change" />

                <!-- Campo investment_amount -->
                <flux:field>
                    @if (app()->getLocale() == 'es')
                        <span class="text-xs">Utilice punto (.) para introducir los decimales</span>
                    @endif
                    <flux:input 
                        name="investment_amount"  
                        placeholder="{{ __('messages.Enter the increment') }}" 
                        value="{{ old('investment_amount') }}"
                        x-bind:disabled="amountChange === '2'" 
                    />
                    <flux:error name="investment_amount" />
                </flux:field>
            </div>


             {{-- <flux:field>
                @if (app()->getLocale() == 'es')
                    <span class="text-xs">Utilice punto (.) para introducir los decimales</span>
                @endif
                <flux:input name='investment_amount'  placeholder="{{ __('messages.Enter the increment') }}" value="{{ old('investment_amount') }}"/>
                <flux:error name="investment_amount" />
            </flux:field> --}}


            <!-- Input visible (solo lectura, formato local) -->
            <flux:label for="opening_date_display" class="mt-2!">{{ __('messages.Opening Date') }}</flux:label>
             <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                @php
                    $activation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->activation_date)) : date("m/d/Y", strtotime($investment->activation_date));
                @endphp
                {{ $activation_date }}
            </p>

            {{-- <flux:label for="opening_date_display" class="mt-2!">{{ __('messages.Closing Date') }}</flux:label>
             <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                @if ($investment->product->has_expiration)
                    @php
                        $closing_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->closing_date)) : date("m/d/Y", strtotime($investment->closing_date));
                    @endphp
                     {{ $closing_date }}
                @else
                    {{ __('messages.No termination time') }}
                @endif
            </p> --}}

            {{-- <flux:label class="mt-2!">{{ __('messages.Capitalization of Interests') }}</flux:label>
            <flux:select wire:model="capitalize" placeholder="{{ __('messages.Capitalizes Interests') }}">
                <flux:select.option value="true">{{ __('messages.Yes') }}</flux:select.option>
                <flux:select.option value="false">{{ __('messages.No') }}</flux:select.option>
            </flux:select> --}}

            <!-- Input oculto: valor por defecto cuando NO está marcado -->
            <input type="hidden" name="capitalize" value="0">
            
            <input 
                type="checkbox" 
                name="capitalize"
                value="1"
                {{ old('capitalize', $investment->capitalize) ? 'checked' : '' }}
                class="rounded border-gray-300 text-zinc-600 shadow-sm mt-4"
            >
            <span class="text-sm text-zinc-700 mt-4">{{ __('messages.Capitalizes Interests') }}?</span>
            </label>

            {{-- class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500" --}}

            {{-- <label class="flex items-center space-x-2 mt-2">
                <input 
                    type="checkbox" 
                    name="is_active"
                    value="1"
                    {{ old('is_active', $investment->is_active) ? 'checked' : '' }}
                    class="rounded border-gray-300 text-zinc-600 shadow-sm"
                >
                <span class="text-sm text-zinc-700">{{ __('messages.Investment is active') }}?</span>
            </label> --}}

            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">{{  __('messages.Send') }}</flux:button>
            </div>

        </form>
    </div>

</x-layouts.admin>