<div>
    <div class="flex justify-left mb-4">
       {{--  <input type="text" class="w-3xl sm:w-xl md:w-2xl rounded-sm m-2 p-2 border-2 shadow-sm" placeholder="{{ __('messages.Enter client name') }}" wire:model.live="search"> --}}

        <flux:input placeholder="{{ __('messages.Enter client name') }}" wire:model.live="search" class="w-2xl! ml-2!" />

        <flux:select wire:model.live="pagination" class="w-48!  ml-4!" placeholder="{{ __('messages.Lines per page') }}">
            <flux:select.option>5</flux:select.option>
            <flux:select.option>10</flux:select.option>
            <flux:select.option>20</flux:select.option>
            <flux:select.option>50</flux:select.option>
        </flux:select>

        <flux:select wire:model.live="is_active" class="w-32!  ml-4!" placeholder="{{ __('messages.Lines per page') }}">
            <flux:select.option value=1>{{ __('messages.Active') }}</flux:select.option>
            <flux:select.option value=0>{{ __('messages.Closed') }}</flux:select.option>
        </flux:select>

    </div>

    {{-- ACTIVE INVESTMENTS --}}
    @if (!$archive)
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            @if ($investments->count())
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            {{ __('messages.Serial') }}
                        </th>

                        <th scope="col" class="px-6 py-3" wire:click="order('name')">
                            {{ __('messages.Client') }} <i class="fa-solid fa-magnifying-glass"></i>

                            @if ($sort == 'name')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-up-a-z float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif
                        </th>

                        <th scope="col" class="px-6 py-3" wire:click="order('email')">
                            {{ __('messages.Email') }} <i class="fa-solid fa-magnifying-glass"></i>

                            @if ($sort == 'email')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-up-a-z float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif
                        </th>

                        <th scope="col" class="px-6 py-3 text-center">
                            {{ __('messages.Investment Amount') }}
                        </th>

                        @if ($archive)
                        <th scope="col" class="px-6 py-3 text-center" wire:click="order('closing_date')">
                            {{ __('messages.Closing Date') }}

                            @if ($sort == 'closing_date')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-up-a-z float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                @endif
                        
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        @endif

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

                                <td class="px-6 py-4">
                                    {{ $investment->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $investment->email }}
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    {{ $investment->investment_amount }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex space-x-2 justify-center">
                                        @can('admin.investments.show')
                                            <a href="{{ route('admin.investments.show', $investment) }}" class="btn btn-warning text-xs">{{ __('messages.Show') }}</a>
                                        @endcan

                                        {{-- @can('admin.investments.add')
                                            <a href="{{ route('admin.investments.add', $investment) }}" class="btn btn-warning text-xs">{{ __('messages.Increase') }}</a>
                                        @endcan --}}


                                        @can('admin.account-statements.index')
                                            <a href="{{ route('admin.account-statements.index', $investment) }}" class="btn btn-info text-xs">{{ __('messages.Account Statement') }}</a>
                                        @endcan

                                        
                                        
                                        @can('admin.investments.edit')
                                            <a href="{{ route('admin.investments.edit', $investment) }}" class="btn btn-secondary text-xs">{{ __('messages.Edit') }}</a>
                                        @endcan
                                    {{--  @can('admin.investments.destroy')
                                            <form action="{{ route('admin.investments.destroy', $investment) }}" method="POST" class="delete-form">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger text-xs">{{ __('messages.Delete') }}</button>
                                            </form>
                                        @endcan --}}
                                        @can('admin.investments.destroy')
                                            {{-- <form action="{{ route('admin.investments.destroy', $investment) }}" method="POST" class="delete-form">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger text-xs">{{ __('messages.Delete') }}</button>
                                            </form> --}}
                                            <a href="#" onclick="confirmarCierre('{{ route('admin.investments.close', $investment) }}')" class="btn btn-danger text-xs">{{ __('messages.Close') }}</a>
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
    @endif


    {{-- ARCHIVED INVESTMENTS (NOT ACTIVE) --}}
    @if ($archive)
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            @if ($investments->count())
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.Serial') }}
                    </th>

                    <th scope="col" class="px-6 py-3" wire:click="order('name')">
                        {{ __('messages.Client') }} <i class="fa-solid fa-magnifying-glass"></i>

                        @if ($sort == 'name')
                            @if ($direction == 'asc')
                                <i class="fa-solid fa-arrow-up-a-z float-right mt-1"></i>
                            @else
                                <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fa-solid fa-sort float-right mt-1"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3" wire:click="order('email')">
                        {{ __('messages.Email') }} <i class="fa-solid fa-magnifying-glass"></i>

                        @if ($sort == 'email')
                            @if ($direction == 'asc')
                                <i class="fa-solid fa-arrow-up-a-z float-right mt-1"></i>
                            @else
                                <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fa-solid fa-sort float-right mt-1"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Investment Amount') }}
                    </th>

                    @if ($archive)
                    <th scope="col" class="px-6 py-3 text-center" wire:click="order('closing_date')">
                        {{ __('messages.Closing Date') }}

                        @if ($sort == 'closing_date')
                            @if ($direction == 'asc')
                                <i class="fa-solid fa-arrow-up-a-z float-right mt-1"></i>
                            @else
                                <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fa-solid fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    @endif

                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('messages.Action') }} 
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($investments as $investment)
                    @if (!$investment->is_active)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        
                        <td class="px-6 py-4">
                            {{ $investment->serial }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $investment->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $investment->email }}
                        </td>
                        
                        <td class="px-6 py-4 text-center">
                            {{ $investment->investment_amount }}
                        </td>

                        <td class="px-6 py-4 text-center">
                                @php
                                    $deactivation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->deactivation_date)) : date("m/d/Y", strtotime($investment->deactivation_date));
                                @endphp
                                {{ $deactivation_date }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex space-x-2 justify-center">
                                @can('admin.investmentarchives.show')
                                    @php
                                        //dd($investment);
                                        $investmentArchive = $investment;
                                    @endphp
                                    <a href="{{ route('admin.investments.show', $investment) }}" class="btn btn-warning text-xs">{{ __('messages.Show') }}</a>
                                @endcan
                                <a href="#" class="btn btn-info text-xs">{{ __('messages.Account Statement') }}</a>
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
    @endif

</div>


