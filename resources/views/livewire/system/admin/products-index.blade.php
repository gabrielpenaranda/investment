<div>
    @php
        $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::DECIMAL);
        $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 2);
    @endphp

    <div class="flex justify-left mb-4">

        <flux:input placeholder="{{ __('messages.Enter client name') }}" wire:model.live="search" class="w-2xl! ml-2!" />

        
        <flux:select wire:model.live="pagination" class="w-48!  ml-4!" placeholder="{{ __('messages.Lines per page') }}">
            <flux:select.option>5</flux:select.option>
            <flux:select.option>10</flux:select.option>
            <flux:select.option>20</flux:select.option>
            <flux:select.option>50</flux:select.option>
        </flux:select>

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
                    {{ __('messages.Description') }}
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    {{ __('messages.Annual Rate') }} %
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
                    <td class="px-6 py-4 text-left">
                        {{ $product->description }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $formatter->format($product->annual_rate) }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2 justify-center">
                            @can('admin.products.edit')
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-secondary text-xs">{{ __('messages.Edit') }}</a>
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

