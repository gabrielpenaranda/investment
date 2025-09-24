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

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Client') }}</flux:label>
                {{-- <flux:select name="user_id" placeholder="{{ __('messages.Enter the client name') }}">
                    @foreach ( $users as $user)
                        <flux:select.option value="{{ $user->id }}">{{ $user->name }}</flux:select.option>
                    @endforeach
                </flux:select> --}}
                <select name="user_id" class="select">
                    <option value="" disable selected>{{ __('messages.Client') }}</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" 
                            {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                <flux:error name="user_id" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Product') }}</flux:label>
                {{-- <flux:select name="product_id" placeholder="{{ __('messages.Enter the product') }}">
                    @foreach ( $products as $product)
                        <flux:select.option value="{{ $product->id }}">{{ $product->name }}  {{ $product->annual_rate }}% @if ($product->has_expiration)  {{ $product->investment_time }} {{ __('messages.Months') }}  @else {{ __('messages.No termination time') }} @endif</flux:select.option>
                    @endforeach
                </flux:select> --}}
                <select name="product_id" class="select">
                    <option value="" disable selected>{{ __('messages.Enter the product') }}</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" 
                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} {{ $product->annual_rate }}%
                        </option>
                    @endforeach
                </select>
                <flux:error name="product_id" />
            </flux:field>


            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Investment Amount') }}</flux:label>
                @if (app()->getLocale() == 'es')
                    <span class="text-xs">Utilice punto (.) para introducir los decimales</span>
                @endif
                <flux:input name='investment_amount' placeholder="{{ __('messages.Enter the investment amount') }}" value="{{ old('investment_amount') }}"/>
                <flux:error name="investment_amount" />
            </flux:field>


            <!-- Input visible (solo lectura, formato local) -->
            <flux:label for="activation_date_display" class="mt-2!">{{ __('messages.Opening Date') }}</flux:label>
            <flux:input
                type="text"
                id="activation_date_display"
                placeholder="{{ app()->getLocale() === 'es' ? 'dd/mm/yyyy' : 'mm/dd/yyyy' }}"
                readonly
            ></flux:input>

            {{-- class="w-full border border-zinc-200 rounded-md p-2 focus:ring-2 focus:ring-zinc-500 focus:border-ring-500" --}}

            <!-- Input oculto (valor real para el backend) -->
            <input
                type="hidden"
                name="activation_date"
                id="activation_date"
                value="{{ old('activation_date') }}"
            >

            {{-- <flux:label class="mt-2!">{{ __('messages.Capitalization of Interests') }}</flux:label>
            <flux:select wire:model="capitalize" placeholder="{{ __('messages.Capitalizes Interests') }}">
                <flux:select.option value=1>{{ __('messages.Yes') }}</flux:select.option>{{ __('messages.Capitalizes Interests') }}
                <flux:select.option value=0>{{ __('messages.No') }}</flux:select.option>
            </flux:select> --}}

            <!-- Input oculto: valor por defecto cuando NO está marcado -->
           <input type="hidden" name="capitalize" value="0">
            
            <input 
                type="checkbox" 
                name="capitalize"
                value="1"
                {{ old('capitalize') ? 'checked' : '' }}
                class="rounded border-gray-300 text-zinc-600 shadow-sm mt-4"
            >
            <flux:error name="capitalize" />
            <span class="text-sm text-zinc-700 mt-4">{{ __('messages.Capitalizes Interests') }}?</span>
            

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

    $('#activation_date_display').datepicker({
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
            $('#activation_date').val(isoDate);
        }
    });

    // Traducción al español
    if (locale === 'es') {
        $.datepicker.setDefaults($.datepicker.regional['es']);
    }

    // Si hay valor guardado (old), formatearlo
    const savedDate = $('#activation_date').val();
    if (savedDate) {
        const date = new Date(savedDate);
        const formatted = $.datepicker.formatDate(dateFormat, date);
        $('#activation_date_display').val(formatted);
    }
});
</script>
</x-layouts.admin>