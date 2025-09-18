@php
    $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::DECIMAL);
    $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 2);
@endphp

{{ $formatter->format($investment->investment_amount) }}

@php
    $activation_date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($investment->activation_date)) : date("m/d/Y", strtotime($investment->activation_date));
@endphp
{{ $activation_date }}

