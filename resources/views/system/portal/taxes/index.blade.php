<x-layouts.portal>
    <div class="mb-4">
        @livewire('system.language-selector')
    </div>

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('portal.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Taxes') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        {{-- @can('admin.products.create')
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">{{ __('messages.New Product') }}</a>
        @endcan --}}
    </div>
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <p class="text-2xl mb-4">{{  __('messages.List of Taxes') }}</p>

    @livewire('system.portal.taxes-index')

</div>


</x-layouts.portal>