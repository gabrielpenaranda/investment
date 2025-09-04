<div>
    <div class="flex justify-between mb-4">
        <input type="text" class="w-3xl sm:w-xl md:w-2xl rounded-sm m-2 p-2 border-2 shadow-sm" placeholder="{{ __('messages.Enter product name') }}" wire:model.live="search">

        

{{-- class="form-control mr-1 sm:mr-2 md:mr-4 text-xs" --}}

        <div class="relative flex-1 ml-8">
            <div class="w-64 flex justify-between">
                <lavel class="m-2">{{ __('messages.Lines per page') }}</label>
                <select name="" id="" wire:model.live="pagination"
                    class="ml-2 px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-sm shadow-sm appearance-none focus:outline-none dark:bg-zinc-800 dark:border-zinc-600 dark:text-white text-center">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>

    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        @if ($products->count())
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" wire:click="order('name')">
                    {{ __('messages.Name') }} <i class="fa-solid fa-magnifying-glass"></i>

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
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Annual Rate') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Investment Time (months)') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Action') }} 
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">
                        {{ $product->name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $product->annual_rate }}
                    </td>
                     <td class="px-6 py-4 text-center">
                        @if ($product->investment_time)
                            {{ $product->investment_time }}
                        @else
                            {{ __('messages.No termination time') }}
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2 justify-center">
                            @can('admin.products.edit')
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary text-xs">{{ __('messages.Edit') }}</a>
                            @endcan
                            @can('admin.products.destroy')
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger text-xs">{{ __('messages.Delete') }}</button>
                                </form>
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
    @if ($products->count())
        {{ $products->links() }}
    @endif
</div>

