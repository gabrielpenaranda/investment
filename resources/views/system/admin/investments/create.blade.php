{{-- @php
    use Carbon\Carbon;

    $ahora = Carbon::now();
    $solo_fecha = $ahora->toDateString();
    $fecha = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($solo_fecha)) : date("m/d/Y", strtotime($solo_fecha)); 
    // $soloFechaFormateada = $ahora->format('Y-m-d');
    // dd(gettype($fecha)); // Muestra la fecha actual en formato YYYY-MM-DD
    //dd($fecha);

@endphp --}}
<x-layouts.admin>

    @stack('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/themes/base/jquery-ui.min.css">

    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.investments.index') }}">
                {{ __('messages.Investments') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.New') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.investments.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.New Investment') }}</p>
        <form action="{{ route('admin.investments.store') }}" method="POST">
            @csrf


            <flux:label class="mt-2!">{{ __('messages.Client') }}</flux:label>
            <flux:select wire:model="user_id" placeholder="{{ __('messages.Enter the client name') }}">
                @foreach ( $users as $user)
                    <flux:select.option value="{{ $user->id }}" wire:key="{{ $user->id }}">{{ $user->name }}</flux:select.option>
                @endforeach
            </flux:select>

            <flux:label class="mt-2!">{{ __('messages.Product') }}</flux:label>
            <flux:select wire:model="product_id" placeholder="{{ __('messages.Enter the product') }}">
                @foreach ( $products as $product)
                    <flux:select.option value="{{ $product->id }}" wire:key="{{ $product->id }}">{{ $product->name }}  {{ $product->annual_rate }}% @if ($product->has_expiration)  {{ $product->investment_time }} {{ __('messages.Months') }}  @else {{ __('messages.No termination time') }} @endif</flux:select.option>
                @endforeach
            </flux:select>


            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Investment Amount') }}</flux:label>
                <flux:input name='investment_amount' placeholder="{{ __('messages.Enter the investment amount') }}" value="{{ old('investment_amount') }}"/>
                <flux:error name="investment_amount" />
            </flux:field>


            <!-- Input visible (solo lectura, formato local) -->
            <flux:label for="opening_date_display" class="mt-2!">{{ __('messages.Opening Date') }}</flux:label>
            <flux:input
                type="text"
                id="opening_date_display"
                placeholder="{{ app()->getLocale() === 'es' ? 'dd/mm/yyyy' : 'mm/dd/yyyy' }}"
                readonly
            ></flux:input>

            {{-- class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500" --}}

            <!-- Input oculto (valor real para el backend) -->
            <input
                type="hidden"
                name="opening_date"
                id="opening_date"
                value="{{ old('opening_date') }}"
            >
            
            {{-- <label class="flex items-center space-x-2 mt-2">
                <input 
                    type="checkbox" 
                    name="is_active"
                    value="1"
                    {{ old('has_expiration') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-zinc-600 shadow-sm"
                >
                <span class="text-sm text-zinc-700">{{ __('messages.Investment is active') }}?</span>
            </label> --}}

            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">{{  __('messages.Send') }}</flux:button>
            </div>

        </form>
    </div>

    @stack('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/jquery-ui.min.js"></script>



   {{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>
 --}}
<script>
$(document).ready(function () {
    const locale = '{{ app()->getLocale() }}';
    const dateFormat = locale === 'es' ? 'dd/mm/yy' : 'mm/dd/yy';

    // Fecha mínima: hoy
    const minDate = new Date();
    // Fecha máxima: último día del mes
    const maxDate = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0);

    $('#opening_date_display').datepicker({
        dateFormat: dateFormat,
        minDate: minDate,
        maxDate: maxDate,
        changeMonth: false,
        changeYear: false,
        showButtonPanel: true,
        closeText: locale === 'es' ? 'Cerrar' : 'Done',
        currentText: locale === 'es' ? 'Hoy' : 'Today',

        // Al seleccionar, actualiza el input oculto
        onSelect: function (dateText) {
            // Convertir a YYYY-MM-DD para el backend
            const date = $(this).datepicker('getDate');
            const isoDate = $.datepicker.formatDate('yy-mm-dd', date);
            $('#opening_date').val(isoDate);
        }
    });

    // Traducción al español
    if (locale === 'es') {
        $.datepicker.setDefaults($.datepicker.regional['es']);
    }

    // Si hay valor guardado (old), formatearlo
    const savedDate = $('#opening_date').val();
    if (savedDate) {
        const date = new Date(savedDate);
        const formatted = $.datepicker.formatDate(dateFormat, date);
        $('#opening_date_display').val(formatted);
    }
});
</script>
</x-layouts.admin>