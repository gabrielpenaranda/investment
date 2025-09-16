<div>
    <div class="flex justify-end mb-4">
{{-- 
        <flux:input placeholder="{{ __('messages.Enter state') }}" wire:model.live="search" class="w-2xl! ml-2!" /> --}}

        
        <flux:select wire:model.live="pagination" class="w-48! mr-4!" placeholder="{{ __('messages.Lines per page') }}">
            <flux:select.option>5</flux:select.option>
            <flux:select.option>10</flux:select.option>
            <flux:select.option>20</flux:select.option>
            <flux:select.option>50</flux:select.option>
        </flux:select>

    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        @if ($account_statements->count())
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Date') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Description') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Contributions') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Distributions') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Account Balance') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($account_statements as $state)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4 text-center text-xs">
                        {{ $state->date }}
                    </td>
                    <td class="px-6 py-4 text-left text-xs">
                        {{ $state->description }}
                    </td>
                    <td class="px-6 py-4 text-right text-xs">
                        @if ($state->type == 'contribution')
                            {{ $state->amount }}
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right text-xs">
                        @if ($state->type == 'distribution')
                            {{ $state->amount }}
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right text-xs">
                        {{ $state->balance }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        @else
        <div class="m-8">
            <span class="font-bold text-md md:text-xl lg:text-2xl">{{ __('messages.No records found') }}</span>
        </div>
        @endif
    </table>
    @if ($account_statements->count())
        {{ $account_statements->links() }}
    @endif
</div>

