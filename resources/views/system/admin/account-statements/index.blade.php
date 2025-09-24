<x-layouts.admin>

    <div class="mb-4">
        @livewire('system.language-selector')
    </div>

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Account Statement') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        @can('admin.investments.index')
            <a href="{{ route('admin.investments.index') }}" class="btn btn-danger">{{ __('messages.Return') }}</a>
        @endcan
    </div>
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <div class="mb-8 flex justify-between items-center p-6">
        <p class="text-2xl mb-4">{{  __('messages.Account Statement') }}</p>
        <a href="{{ route('admin.account-statements.print', $investment) }}" target="_blank" class="btn btn-success">{{ __('messages.Print') }}</a>
    </div>

    <div class="ml-4">
        <p>{{ $investment->user->name }}</p>
        <p>{{ $investment->user->address }}, {{ $investment->user->state->code }}</p>
        <p>{{ $investment->user->zip_code }}</p>
    </div>


    @livewire('system.admin.account-statement-index', ['investment' => $investment])

</div>


</x-layouts.admin>