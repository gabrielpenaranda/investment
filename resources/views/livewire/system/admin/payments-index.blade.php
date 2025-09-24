
<div>
    @php
        use Carbon\Carbon;
        $currentYear = Carbon::now()->format('Y');
        $currentMonth = Carbon::now()->format('m');
        $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::DECIMAL);
        $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 2);
    @endphp

    <div class="flex justify-left mb-4">
      {{--   <flux:input placeholder="{{ __('messages.Enter client name') }}" wire:model.live="search" class="w-2xl! ml-2!" /> --}}

        
        <flux:select wire:model.live="pagination" class="w-48!  ml-4!" placeholder="{{ __('messages.Lines per page') }}">
            <flux:select.option>5</flux:select.option>
            <flux:select.option>10</flux:select.option>
            <flux:select.option>20</flux:select.option>
            <flux:select.option>50</flux:select.option>
        </flux:select>

        <flux:select wire:model.live="year" class="w-48!  ml-4!" placeholder="{{ __('messages.Year') }}">
            @for ($i=$currentYear; $i >= 1990; $i--)
                <flux:select.option value="{{ $i }}">{{ $i }}</flux:select.option>
            @endfor
        </flux:select>

        <flux:select wire:model.live="month" class="w-48!  ml-4!" placeholder="{{ __('messages.Month') }}">
            @for ($i=12; $i > 0; $i--)
                <flux:select.option value="{{ $i }}">{{ $i }}</flux:select.option>
            @endfor
        </flux:select>

    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        @if ($payments->count())
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                 <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Serial') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('messages.Date') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Investment Serial') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Name') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Email') }}
                </th>
               <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Amount') }} USD
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">
                        {{ $payment->serial }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @php
                            $payment_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($payment->date)) : date("m/d/Y", strtotime($payment->date));
                        @endphp
                        {{ $payment_date }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $payment->investment->serial }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $payment->investment->name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $payment->investment->email }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $formatter->format(round($payment->amount, 2)) }}
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
    @if ($payments->count())
        {{ $payments->links() }}
    @endif
</div>

