<x-layouts.admin>

    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.states.index') }}">
                {{ __('messages.states') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.New') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.states.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>
    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.New State') }}</p>
        <form action="{{ route('admin.states.store') }}" method="POST">
            @csrf
            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.State name') }}</flux:label>
                <flux:input name='name' placeholder="{{ __('messages.Enter the name') }}" value="{{ old('name') }}"/>
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.State Code') }}</flux:label>
                <flux:input name='code' placeholder="{{ __('messages.Enter the code') }}" value="{{ old('code') }}"/>
                <flux:error name="code" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Country') }}</flux:label>
                <select name="country_id" class="select" placeholder="{{ __('messages.Select country') }}">
                    <option value="" disable selected>{{ __('messages.Select country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" 
                            {{ old('country_id') == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                <flux:error name="country_id" />
            </flux:field>


            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">{{  __('messages.Send') }}</flux:button>
            </div>

        </form>
    </div>

</x-layouts.admin>