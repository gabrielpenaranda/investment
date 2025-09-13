<x-layouts.admin>

    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.countries.index') }}">
                {{ __('messages.countries') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.New') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.countries.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.New Country') }}</p>
        <form action="{{ route('admin.countries.store') }}" method="POST">
            @csrf

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Country name') }}</flux:label>
                <flux:input name='name' placeholder="{{ __('messages.Enter the name') }}" value="{{ old('name') }}"/>
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Country Code') }}</flux:label>
                <flux:input name='code' placeholder="{{ __('messages.Enter the code') }}" value="{{ old('description') }}"/>
                <flux:error name="code" />
            </flux:field>

            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">{{  __('messages.Send') }}</flux:button>
            </div>

        </form>
    </div>

</x-layouts.admin>