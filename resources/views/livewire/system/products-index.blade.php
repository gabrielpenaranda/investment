<div>
    <div class="flex justify-between">
        <input type="text" class="w-3xl sm:w-xl md:w-2xl rounded-sm m-2 p-2 border-2" placeholder="{{ __('Enter product name') }}" wire:model.live="search">

        <div class="flex-1">
            {{-- <span>Mostrar</span> --}}
            <select name="" id="" wire:model.live="pagination"
                class="form-control mr-1 sm:mr-2 md:mr-4 text-xs">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        @if ($products->count())
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('Name') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Annual Rate') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Investment Time') }}
                </th>
                <th scope="col" class="px-6 py-3" width="10px">
                    {{ __('Action') }} 
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">
                        {{ $product->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->annual_rate }}
                    </td>
                     <td class="px-6 py-4">
                        {{ $product->investment_time }}
                    </td>
                    <td class="px-6 py-4">
                        @foreach ($product->roles as $role)
                            {{ $role->name  }}
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            @can('admin.products.edit')
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-blue text-xs">{{ __('Edit') }}</a>
                            @endcan
                            @can('admin.products.destroy')
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-red text-xs">{{ __('Delete') }}</button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @else
        <div class="m-8">
            <span class="font-bold text-md md:text-xl lg:text-2xl">{{ __('No records found') }}</span>
        </div>
        @endif
    </table> 
</div>

