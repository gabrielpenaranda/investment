<div>
    @php
        use Carbon\Carbon;
        $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::DECIMAL);
        $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 2);
    @endphp
    <div class="flex justify-left mb-4">
        {{-- <flux:input placeholder="{{ __('messages.Enter client name') }}" wire:model.live="search" class="w-2xl! ml-2!" /> --}}

        <flux:select wire:model.live="user" class="ml-4!">
            <flux:select.option value="">{{ __('messages.Choose the investor') }}</flux:select.option>
            @foreach($users as $u)
                <flux:select.option value="{{ $u->id }}">{{ $u->name }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:select wire:model.live="pagination" class="w-48!  ml-4!" placeholder="{{ __('messages.Lines per page') }}">
            <flux:select.option>5</flux:select.option>
            <flux:select.option>10</flux:select.option>
            <flux:select.option>20</flux:select.option>
            <flux:select.option>50</flux:select.option>
        </flux:select>

    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        @if ($taxes->count())
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Year') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Earnings') }} USD
                </th>
                {{-- <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Investment Time (months)') }}
                </th> --}}
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Action') }} 
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taxes as $tax)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4 text-center">
                        {{ $tax->year }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $formatter->format(round($tax->earnings, 2)) }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2 justify-center">
                            @if ($tax->year < (int)Carbon::now()->format('Y'))
                                @can('admin.taxes.show')
                                    <a href="{{ route('admin.taxes.show', $tax) }}" class="btn btn-secondary text-xs">{{ __('messages.Form 1099') }}</a>
                                @endcan
                            @endif
                        </div>
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
    @if ($taxes->count())
        {{ $taxes->links() }}
    @endif
</div>

