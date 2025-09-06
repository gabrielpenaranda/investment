
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
                {{ __('messages.Show') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.investments.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.Show Investment') }}</p>

            <flux:label class="mt-2!">{{ __('messages.Serial') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $investment->serial }}
            </p>

            <flux:label class="mt-2!">{{ __('messages.Client') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $investment->name }}
            </p>

            <flux:label class="mt-2!">{{ __('messages.Client') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $investment->email }}
            </p>

            <flux:label class="mt-2!">{{ __('messages.Product') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $investment->product->name }}
            </p>

            @php
                $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::DECIMAL);
                $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 2);
            @endphp

            <flux:label class="mt-2!">{{ __('messages.Investment Amount') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $formatter->format($investment->investment_amount) }}
            </p>

            <flux:label class="mt-2!">{{ __('messages.Annual Rate') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $formatter->format($investment->product->annual_rate) }}
            </p>

            <!-- Input visible (solo lectura, formato local) -->
            <flux:label for="opening_date_display" class="mt-2!">{{ __('messages.Opening Date') }}</flux:label>
             <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                @php
                    $activation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->activation_date)) : date("m/d/Y", strtotime($investment->activation_date));
                @endphp
                {{ $activation_date }}
            </p>

            {{-- <flux:label for="opening_date_display" class="mt-2!">{{ __('messages.Opening Date') }}</flux:label>
             <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                @if ($investment->product->has_expiration)
                    @php
                        $closing_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->closing_date)) : date("m/d/Y", strtotime($investment->closing_date));
                    @endphp
                     {{ $closing_date }}
                @else
                    {{ __('messages.No termination time') }}
                @endif
            </p>
 --}}

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

            {{-- <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">{{  __('messages.Send') }}</flux:button>
            </div> --}}
    </div>

</x-layouts.admin>