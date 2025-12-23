<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form 1099-INT</title>
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('favicon/favicon.svg') }}" type="image/svg+xml">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12pt;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            padding: 10pt 0;
            border-bottom: 2pt solid #000;
            margin-bottom: 20pt;
        }
        .header h1 {
            font-size: 18pt;
            margin: 0;
        }
        .header p {
            margin: 3pt 0 0;
            font-size: 11pt;
        }
        .notice {
            background-color: #fff3cd;
            padding: 10pt;
            border: 1pt solid #ffeaa7;
            margin: 15pt 0;
            font-size: 10pt;
        }
        .columns {
            width: 100%;
            table-layout: fixed;
        }
        .col-left, .col-right {
            width: 50%;
            vertical-align: top;
            padding: 5pt;
        }
        .section-title {
            font-weight: bold;
            margin: 8pt 0 4pt;
        }
        .amount-box {
            margin-top: 20pt;
            padding: 10pt;
            border: 1pt solid #000;
            background-color: #f8f9fa;
        }
        .amount-box .label {
            font-weight: bold;
        }
        .amount-box .value {
            font-size: 16pt;
            font-weight: bold;
            color: #1f7a1f;
            text-align: right;
            margin-top: 5pt;
        }
        .footer {
            margin-top: 30pt;
            font-size: 9pt;
            text-align: center;
            color: #6c757d;
        }
        @media print {
            body { padding: 0; }
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Header -->
        <div class="header">
            <h1>{{ $tax->year }} Form 1099-INT</h1>
            <p>Interest Income | OMB No. 1545-0112</p>
            <p><strong>Copy B — For Recipient</strong></p>
        </div>

        <!-- Legal Notice -->
        <div class="notice">
            <strong>This is important tax information</strong> and is being furnished to the Internal Revenue Service. If you are required to file a return, a negligence penalty or other sanction may be imposed on you if this income is taxable and the IRS determines that it has not been reported.
        </div>

        <!-- Two Columns -->
        <table class="columns">
            <tr>
                <td class="col-left">
                    <div class="section-title">Payer's Information</div>
                    <div>
                        <strong>Asset Performance Fund LLC</strong><br>
                        423 N Creston Dr Ste 114<br>
                        Mesa, AZ 85213<br>
                        <strong>Payer's federal ID:</strong> 99-4514077
                    </div>

                    <div style="margin-top: 20pt;">
                        <div class="section-title">Recipient's Information</div>
                        <div>
                            <strong>{{ $tax->user->name }}</strong><br>
                            {{ $tax->user->address }}<br>
                            {{ $tax->user->state->code }}, {{ $tax->user->zip_code }}<br>
                            <strong>Recipient's ID:</strong>
                            @if ($tax->user->type == 'Person')
                                {{-- @php
                                    $formatted = substr($tax->user->social_security, 0, 3) . '-' . substr($tax->user->social_security, 3, 2) . '-' . substr($tax->user->social_security, 5);
                                @endphp
                                {{ $formatted }} --}}
                                 {{ $tax->user->social_security }}
                            @else
                                {{-- @php
                                    $formatted = substr($tax->user->fin, 0, 2) . '-' . substr($tax->user->fin, 3);
                                @endphp
                                {{ $formatted }} --}}
                                {{ $tax->user->fin }}
                            @endif
                        </div>
                    </div>
                </td>
                <td class="col-right">
                    <div>
                        <strong>For questions, contact:</strong><br>
                        Asset Performance Fund LLC<br>
                        Phone: 480-334-2788
                    </div>
                </td>
            </tr>
        </table>

        <!-- Box 1: Interest Income -->
        <div class="amount-box">
            <div class="label">Box 1: Interest Income</div>
            <div class="value">${{ $tax->earnings }}</div>
        </div>

        <!-- Footer -->
        <div class="footer">
            This document is for informational purposes only. Consult your tax advisor for official filing.
        </div>

    </div>
</body>
</html>