<x-layouts.portal>

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('portal.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Account Statement') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        @can('portal.investments.index')
            <a href="{{ route('portal.investments.index') }}" class="btn btn-danger">{{ __('messages.Return') }}</a>
        @endcan
    </div>
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="mb-8 flex justify-between items-center p-6">
        <p class="text-2xl mb-4">{{  __('messages.Account Statement') }}</p>
        <a href="{{ route('portal.account-statements.print', $investment) }}" target="_blank" class="btn btn-success">{{ __('messages.Print') }}</a>
    </div>

    @if (auth()->user()->id == $investment->user_id)

        <p>{{ $investment->user->name }}</p>
        <p>{{ $investment->user->address }}, {{ $investment->user->state->code }}</p>
        <p>{{ $investment->user->zip_code }}</p>

        @livewire('system.portal.account-statement-index', ['investment' => $investment])

    @endif

</div>

</x-layouts.portal>