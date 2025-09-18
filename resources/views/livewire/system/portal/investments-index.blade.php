<div>

    @php
        $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::DECIMAL);
        $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 2);
    @endphp

    <div class="flex justify-left mb-4">
       {{--  <input type="text" class="w-3xl sm:w-xl md:w-2xl rounded-sm m-2 p-2 border-2 shadow-sm" placeholder="{{ __('messages.Enter client name') }}" wire:model.live="search"> --}}

        {{-- <flux:input placeholder="{{ __('messages.Enter client name') }}" wire:model.live="search" class="w-2xl! ml-2!" /> --}}

        <flux:select wire:model.live="pagination" class="w-48!  ml-4!" placeholder="{{ __('messages.Lines per page') }}">
            <flux:select.option>5</flux:select.option>
            <flux:select.option>10</flux:select.option>
            <flux:select.option>20</flux:select.option>
            <flux:select.option>50</flux:select.option>
        </flux:select>

       {{--  <flux:select wire:model.live="is_active" class="w-32!  ml-4!" placeholder="{{ __('messages.Lines per page') }}">
            <flux:select.option value=1>{{ __('messages.Active') }}</flux:select.option>
            <flux:select.option value=0>{{ __('messages.Closed') }}</flux:select.option>
        </flux:select> --}}

    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        @if ($investments->count())
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Serial') }}
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Opening Date') }}
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Investment Amount') }} USD
                    </th>

                     <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Status') }}
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Action') }} 
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($investments as $investment)
                    @if ($investment->is_active)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            
                            <td class="px-6 py-4">
                                {{ $investment->serial }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                @php
                                    $activation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->activation_date)) : date("m/d/Y", strtotime($investment->activation_date));
                                @endphp
                                {{ $activation_date }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                {{ $formatter->format($investment->investment_amount) }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                @if ($investment->is_active)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ __('messages.Active_s') }}</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ __('messages.Closed_s') }}</span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex space-x-2 justify-center">

                                    @can('portal.investments.show')
                                        <a href="{{ route('portal.investments.show', $investment) }}" class="btn btn-warning text-xs">{{ __('messages.Show') }}</a>
                                    @endcan

                                    @can('portal.account-statements.index')
                                        <a href="{{ route('portal.account-statements.index', $investment) }}" class="btn btn-info text-xs">{{ __('messages.Account Statement') }}</a>
                                    @endcan
                                    
                                </div>
                            
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            @else
            <div class="m-8">
                <span class="font-bold text-md md:text-xl lg:text-2xl">{{ __('messages.No records found') }}</span>
            </div>
        @endif
    </table>
    @if ($investments->count())
        {{ $investments->links() }}
    @endif



</div>