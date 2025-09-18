
<x-layouts.portal>


    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('portal.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('portal.investments.index') }}">
                {{ __('messages.Investments') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Show') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('portal.investments.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        @if (auth()->user()->id == $investment->user_id)

            @if ($investment->is_active)
                <p class="text-2xl mb-4">{{  __('messages.Show Investment') }}</p>
            @else
                <p class="text-2xl mb-4">{{  __('messages.Show Closed Investment') }}</p>
            @endif

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

                <flux:label class="mt-2!">{{ __('messages.Initial Investment Amount') }}</flux:label>
                <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                    {{ $formatter->format($investment->initial_amount) }}
                </p>

                <flux:label class="mt-2!">{{ __('messages.Investment Amount') }}</flux:label>
                <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                    {{ $formatter->format($investment->investment_amount) }}
                </p>

                <flux:label class="mt-2!">{{ __('messages.Annual Rate') }}</flux:label>
                <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                    {{ $formatter->format($investment->product->annual_rate) }}
                </p>

                <flux:label  class="mt-2!">{{ __('messages.Opening Date') }}</flux:label>
                <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                    @php
                        $activation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->activation_date)) : date("m/d/Y", strtotime($investment->activation_date));
                    @endphp
                    {{ $activation_date }}
                </p>

                @if (!$investment->is_active)
                    <flux:label  class="mt-2!">{{ __('messages.Closing Date') }}</flux:label>
                    <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                        @php
                            $deactivation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->deactivation_date)) : date("m/d/Y", strtotime($investment->deactivation_date));
                        @endphp
                        {{ $deactivation_date }}
                    </p>
                @endif

                <flux:label class="mt-2!">{{ __('messages.Capitalizable Interest') }}</flux:label>
                <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                    @if ($investment->capitalize)
                        Yes
                    @else
                        No
                    @endif
                </p>

            @endif
    </div>

</x-layouts.portal>