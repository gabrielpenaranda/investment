<x-layouts.portal>

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('portal.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Reports') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        {{-- @can('admin.countries.create')
            <a href="{{ route('portal.reports.create') }}" class="btn btn-primary">{{ __('messages.New Report') }}</a>
        @endcan --}}
    </div>
    

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <p class="text-2xl mb-4">{{  __('messages.List of Reports') }}</p>

        @livewire('system.portal.reports-index')

    </div>


</x-layouts.portal>