<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Account Statement - {{ $investment->name }}</title>
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('favicon/favicon.svg') }}" type="image/svg+xml">
    <style>
        /* Estilo general */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10pt; /* Tamaño de fuente para PDF */
            color: #333;
        }

        .page {
            width: 21cm; /* Ancho carta */
            height: 29.7cm; /* Alto carta */
            margin: auto;
            padding: 2cm 2cm 3cm 2cm; /* Margen para encabezado y pie de página */
            box-sizing: border-box;
            page-break-after: always;
        }

        /* Encabezado */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* margin-bottom: 1cm; */
            /* border-bottom: 1px solid #ccc; */
            padding-bottom: 0.5cm;
        }

        .logo-placeholder img {
            width: 120px;
            height: 42px;
        }

        .header-info {
            text-align: right;
        }

        .header-info h4 {
            margin: 0 0 6pt;
            font-size: 14pt;
        }

        .header-info p {
            margin: 0 0 4pt;
            font-size: 9pt;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10pt;
        }

        th {
            background-color: #f2f2f2;
            padding: 6pt;
            text-align: center;
            border: 1px solid #ddd;
            font-weight: bold;
            font-size: 9pt;
        }

        td {
            padding: 6pt;
            border: 1px solid #ddd;
            font-size: 9pt;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        /* Pie de página */
        .footer {
            margin-top: 0.5cm;
            margin-bottom: 2cm; /* Espacio entre el contenido y el pie */
            text-align: center;
            font-size: 8pt;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 0.5cm;
        }

        /* Forzar salto de página si es necesario */
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    
    <div class="page">
        <!-- Encabezado -->
        <div class="header">
            <div class="logo-placeholder">
                {{-- <img src="image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Logo APF color.png'))) }}" alt="Logo"> --}}
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Logo APF color.png'))) }}" alt="Logo">
            </div>
            <div class="header-info">
                <h4>{{ __('messages.Account Statement') }}</h4>
                <p><strong>{{ $investment->name }}</strong></p>
                <p>{{ $investment->user->address }}</p>
                <p>{{ $investment->user->state->code }}, {{ $investment->user->zip_code }}</p>
            </div>
        </div>

        <!-- Contenido -->
        <div class="content">
            @foreach ($account_statements->chunk(10) as $chunk)
                <table>
                    <thead>
                        <tr>
                            <th>{{ __('messages.Date') }}</th>
                            <th>{{ __('messages.Description') }}</th>
                            <th>{{ __('messages.Contributions') }}</th>
                            <th>{{ __('messages.Distributions') }}</th>
                            <th>{{ __('messages.Account Balance') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chunk as $state)
                            <tr>
                                <td style="text-align: center;">
                                    @php
                                        $date = app()->getLocale() === 'es' ? date("d/m/Y", strtotime($state->date)) : date("m/d/Y", strtotime($state->date));
                                    @endphp
                                    {{ $date }}
                                </td>
                                <td style="text-align: left;">{{ $state->description }}</td>
                                <td style="text-align: right;">
                                    @if ($state->type == 'contribution')
                                        {{ number_format($state->amount, 2) }}
                                    @endif
                                </td>
                                <td style="text-align: right;">
                                    @if ($state->type == 'distribution')
                                        {{ number_format($state->amount, 2) }}
                                    @endif
                                </td>
                                <td style="text-align: right;">
                                    {{ number_format($state->balance, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="page-break"></div>
            @endforeach
        </div>

        <!-- Pie de página -->
        <div class="footer">
            {{ __('messages.Page') }} {{ $pageNumber ?? 1 }} {{ __('messages.Of') }} {{ ceil($account_statements->count() / 20) }}
            — {{ __('messages.Confidential. Generated on') }} {{ now()->format('m/d/Y') }}.
        </div>
    </div>

</body>
</html>