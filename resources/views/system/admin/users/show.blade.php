<x-layouts.admin>

    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.users.index') }}">
                {{ __('messages.Users') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Show') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.users.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.Show User') }}</p>

        <flux:label class="mt-2!">{{ __('messages.Client') }}</flux:label>
        <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
            {{ $user->name }}
        </p>

        <flux:label class="mt-2!">{{ __('messages.Email') }}</flux:label>
        <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
            {{ $user->email }}
        </p>

        <flux:label class="mt-2!">{{ __('messages.Country & State') }}</flux:label>
        <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
            {{ $user->state->country->name }} - {{ $user->state->name }}
        </p>

        <flux:label class="mt-2!">{{ __('messages.Address') }}</flux:label>
        <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
            {{ $user->address }}
        </p>

        <flux:label class="mt-2!">{{ __('messages.Phone Number') }}</flux:label>
        <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
            {{ $user->phone }}
        </p>

        <flux:label class="mt-2!">{{ __('messages.ZIP Code') }}</flux:label>
        <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
            {{ $user->zip_code }}
        </p>

        <flux:label class="mt-2!">{{ __('messages.User Type') }}</flux:label>
        <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
            {{ $user->email }}
        </p>

        @if ($user->type === 'Company')
            <flux:label class="mt-2!">{{ __('messages.Federal Identification Number') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $user->fin }}
            </p>
        @endif

        @if ($user->type === 'Person')
            <flux:label class="mt-2!">{{ __('messages.Social Security Number') }}</flux:label>
            <p class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500 text-red-500">
                {{ $user->social_security }}
            </p>
        @endif


    </div>

</x-layouts.admin>