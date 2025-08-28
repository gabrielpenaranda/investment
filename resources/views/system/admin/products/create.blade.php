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

         <a href="{{ route('admin.products.index') }}" class="btn btn-danger">{{ __('Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.New Product') }}</p>
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <flux:input name='name' placeholder="{{ __('messages.Enter the name') }}" label="{{ __('messages.Product name') }}" value="{{ old('name') }}"></flux:input>

            <flux:input name='description' placeholder="{{ __('messages.Enter the description') }}" label="{{ __('messages.Product description') }}" value="{{ old('description') }}"></flux:input>

            <flux:input name='annual_rate' placeholder="{{ __('messages.Enter the rate') }}" label="{{ __('messages.Annual rate') }}" value="{{ old('annual_rate') }}"></flux:input>

            <flux:input name='description' placeholder="{{ __('messages.Enter the description') }}" label="{{ __('messages.Product description') }}" value="{{ old('description') }}"></flux:input>

            <div class="flex mt-2">
                <label class="inline-flex items-center">
                    <input 
                        type="checkbox" 
                        name="has_expiration" 
                        value="1"
                        @checked(old('has_expiration'))>
                </label>
                <span>{{ __('messages.Product has termination date?') }}</span>
            </div>

            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">Enviar</flux:button>
            </div>

        </form>
    </div>

</x-layouts.admin>