
<x-layouts.admin>

    @php
        $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::DECIMAL);
        $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 2);
    @endphp

    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.interests.index') }}">
                {{ __('messages.Interests') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Show') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.interests.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.Show Interest') }}</p>
        
        @if ($interest->investment->is_active)
            <p class="text-xl mb-4">{{  __('messages.Investment Information') }}</p>
        @else
            <p class="text-xl mb-4">{{  __('messages.Closed Investment Information') }}</p>
        @endif

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Serial') }}
                    </th>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Client') }}
                    </th>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Email') }}
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Investment Amount') }} USD
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Opening Date') }}
                    </th>

                    @if ($interest->investment->deactivation_date != null)
                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Closing Date') }}
                    </th>
                    @endif

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Capitalizable Interests') }}
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    
                    <td class="px-6 py-4">
                        {{ $interest->investment->serial }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $interest->investment->name }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $interest->investment->email }}
                    </td>
                    
                    <td class="px-6 py-4 text-center">
                        {{ $formatter->format(round($interest->investment->investment_amount, 2)) }}
                    </td>

                    <td class="px-6 py-4 text-center">
                        @php
                            $activation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($interest->investment->activation_date)) : date("m/d/Y", strtotime($interest->investment->activation_date));
                        @endphp
                        {{ $activation_date }}
                    </td>

                    @if ($interest->investment->deactivation_date != null)
                        <td class="px-6 py-4 text-center">
                                @php
                                    $deactivation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($interest->investment->deactivation_date)) : date("m/d/Y", strtotime($interest->investment->deactivation_date));
                                @endphp
                                {{ $deactivation_date }}
                        </td>
                    @endif

                    <td class="px-6 py-4 text-center">
                        @if ($interest->investment->capitalize)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="text-xl mb-4 mt-8">{{  __('messages.Interest Information') }}</p>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Serial') }}
                    </th>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Interest Amount') }} USD
                    </th>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Process') }}
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Condition') }}
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Status') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    
                    <td class="px-6 py-4">
                        {{ $interest->serial }}
                    </td>

                    <td class="px-6 py-4 text-center">
                        {{ $formatter->format(round($interest->interest_amount, 2)) }}
                    </td>

                    <td class="px-6 py-4">
                        @if ($interest->approved)
                            {{  __('messages.Approved') }}
                        @else
                            {{  __('messages.Pending') }}
                        @endif
                    </td>
                    
                    <td class="px-6 py-4 text-center">
                        @if ($interest->condition == 'paid')
                            {{  __('messages.Paid') }}
                        @else
                            {{  __('messages.Unpaid') }}
                        @endif
                    </td>

                    <td class="px-6 py-4 text-center">
                        @if ($interest->status == 'payable')
                            {{  __('messages.Payable') }}
                        @else
                            {{  __('messages.Cumulative') }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p class="text-md mb-4 mt-8">{{  __('messages.Transaction Records') }}</p>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Starting Date') }}
                    </th>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Ending Date') }}
                    </th>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Investment Amount') }} USD
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Rate') }} %
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Days') }}
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Interests') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($investmentChanges as $investmentChange)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        
                        <td class="px-6 py-4">
                            @php
                            $activation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investmentChange->activation_date)) : date("m/d/Y", strtotime($investmentChange->activation_date));
                            @endphp
                            {{ $activation_date }}
                        </td>

                        <td class="px-6 py-4">
                            @php
                            $deactivation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investmentChange->deactivation_date)) : date("m/d/Y", strtotime($investmentChange->deactivation_date));
                            @endphp
                            {{ $deactivation_date }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ $formatter->format(round($investmentChange->amount, 2)) }}
                        </td>

                        <td class="px-6 py-4 text-center">
                             {{ $formatter->format(round($investmentChange->rate)) }}
                        </td>
                        
                        <td class="px-6 py-4 text-center">
                            {{ $investmentChange->total_days }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ $formatter->format(round($investmentChange->interests, 2)) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</x-layouts.admin>