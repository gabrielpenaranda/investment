<x-layouts.admin>

    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.products.index') }}">
                {{ __('messages.Products') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.New') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.products.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.New Product') }}</p>
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Product name') }}</flux:label>
                <flux:input name='name' placeholder="{{ __('messages.Enter the name') }}" value="{{ old('name') }}"/>
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Product description') }}</flux:label>
                <flux:input name='description' placeholder="{{ __('messages.Enter the description') }}" value="{{ old('description') }}"/>
                <flux:error name="description" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Annual rate') }} (%)</flux:label>
                @if (app()->getLocale() == 'es')
                    <span class="text-xs">Utilice punto (.) para introducir los decimales</span>
                @endif
                <flux:input name='annual_rate' placeholder="{{ __('messages.Enter the rate') }} (%)" value="{{ old('annual_rate') }}"/>
                <flux:error name="annual_rate" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Minimum Opening Amount') }} USD</flux:label>
                @if (app()->getLocale() == 'es')
                    <span class="text-xs">Utilice punto (.) para introducir los decimales</span>
                @endif
                <flux:input name='minimum_investment' placeholder="{{ __('messages.Enter the amount') }}" value="{{ old('minimum_investment') }}"/>
                <flux:error name="minimum_investment" />
            </flux:field>


            {{-- <div x-data="{ customRateEnabled: $el.querySelector('[name=has_expiration]').checked }">
                <label class="flex items-center space-x-2 mt-2">
                    <input 
                        type="checkbox" 
                        name="has_expiration"
                        x-model="customRateEnabled"
                        value="1"
                        {{ old('has_expiration') ? 'checked' : '' }}
                        class="rounded border-gray-300 text-indigo-600 shadow-sm"
                    >
                    <span class="text-sm text-gray-700">{{ __('messages.Product has termination date?') }}</span>
                </label>

                <flux:field>
                    <flux:label class="mt-2!">{{ __('messages.Investment Time (months)') }}</flux:label>
                    <flux:input name='investment_time' placeholder="{{ __('messages.Enter the number of months') }} (12 - 60)" value="{{ old('investment_time') }}"
                         id="investment_time"
                         x-bind:disabled="!customRateEnabled"
                         x-bind:class="{ 'bg-gray-100 cursor-not-allowed': !customRateEnabled }"
                    />
                    <flux:error name="investment_time" />
                </flux:field>
            </div> --}}


            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">{{  __('messages.Send') }}</flux:button>
            </div>

        </form>
    </div>

</x-layouts.admin>