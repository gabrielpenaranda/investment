<div>
    <div class="flex justify-left mb-4">
       {{--  <input type="text" class="w-3xl sm:w-xl md:w-2xl rounded-sm m-2 p-2 border-2 shadow-sm" placeholder="{{ __('messages.Enter client name') }}" wire:model.live="search"> --}}

        <flux:input placeholder="{{ __('messages.Enter client name') }}" wire:model.live="search" class="w-xl! ml-2!" />

        

{{-- class="form-control mr-1 sm:mr-2 md:mr-4 text-xs" --}}

      {{--   <div class="relative flex-1 ml-8">
            <div class="w-64 flex justify-between">
                <lavel class="m-2">{{ __('messages.Lines per page') }}</label>
                <select name="" id="" wire:model.live="pagination"
                    class="ml-2 px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-sm shadow-sm appearance-none focus:outline-none dark:bg-zinc-800 dark:border-zinc-600 dark:text-white text-center">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div> --}}

        <flux:select wire:model.live="pagination" class="w-48!  ml-4!" placeholder="{{ __('messages.Lines per page') }}">
            <flux:select.option>5</flux:select.option>
            <flux:select.option>10</flux:select.option>
            <flux:select.option>20</flux:select.option>
            <flux:select.option>50</flux:select.option>
        </flux:select>


        <flux:select wire:model.live="is_active" class="w-32!  ml-4!" placeholder="{{ __('messages.List investments') }}">
            <flux:select.option value='1'>Activas</flux:select.option>
            <flux:select.option value='2'>Cerradas</flux:select.option>
        </flux:select>

        {{-- <flux:field variant="inline" class="ml-4!">
            <flux:label>{{ __('messages.Show Active') }}</flux:label>
            <flux:switch wire:model.live="is_active" />
            <flux:error name="is_active" />
        </flux:field> --}}

    </div>

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

                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Action') }} 
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($investments as $investment)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    
                    <td class="px-6 py-4">
                        {{ $investment->serial }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $investment->user->name }}
                    </td>

                     <td class="px-6 py-4">
                        {{ $investment->user->email }}
                    </td>
                    
                    <td class="px-6 py-4 text-center">
                        {{ $investment->investment_amount }}
                    </td>
                    
                    <td class="px-6 py-4 text-center">
                        @if ($investment->closing_date)
                            @php
                                $closing_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->closing_date)) : date("m/d/Y", strtotime($investment->closing_date));
                            @endphp
                            {{ $closing_date }}
                        @else
                            {{ __('messages.No termination time') }}
                        @endif
                    </td>
                    
                    <td class="px-6 py-4">
                        <div class="flex space-x-2 justify-center">
                            @can('admin.investments.edit')
                                <a href="{{ route('admin.investments.edit', $investment) }}" class="btn btn-primary text-xs">{{ __('messages.Edit') }}</a>
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
                                <a href="{{ route('admin.investments.destroy', $investment) }}" class="btn btn-danger text-xs">{{ __('messages.Close') }}</a>
                            @endcan
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
    @if ($investments->count())
        {{ $investments->links() }}
    @endif
</div>


