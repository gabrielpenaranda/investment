<x-layouts.admin>
    <div class="mb-4">
        @livewire('system.language-selector')
    </div>

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.taxes.index') }}">
                {{ __('messages.Taxes') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Form 1099') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{ route('admin.taxes.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="mb-8 flex justify-between items-center p-6">
        <p class="text-2xl mb-4">{{  __('messages.Form 1099') }}</p>
        <a href="{{ route('admin.taxes.print', $tax) }}" target="_blank" class="btn btn-success">{{ __('messages.Print') }}</a>
    </div>
    


   {{--  <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">

        <!-- Header -->
        <div class="bg-blue-700 text-white p-4 text-center">
            <h1 class="text-2xl font-bold">2024 Form 1099-INT</h1>
            <p class="text-blue-100">Interest Income | OMB No. 1545-0112</p>
            <p class="text-sm mt-1">Copy B — For Recipient</p>
        </div>

        <!-- Legal Notice -->
        <div class="bg-red-50 border border-red-200 p-4 text-sm text-red-800">
            <strong>This is important tax information</strong> and is being furnished to the Internal Revenue Service. If you are required to file a return, a negligence penalty or other sanction may be imposed on you if this income is taxable and the IRS determines that it has not been reported.
        </div>

        <!-- Two Columns: Payer & Recipient -->
        <div class="grid md:grid-cols-2 gap-8 p-6">

            <!-- Payer Info -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Payer's Information</h2>
                <div class="space-y-1 text-gray-700">
                    <p class="font-medium">Asset Performance Fund LLC</p>
                    <p>423 N Creston Dr Ste 114</p>
                    <p>Mesa, AZ 85213</p>
                    <p><span class="font-medium">Payer's federal ID:</span> 99-4514077</p>
                    <p class="mt-3 text-sm text-gray-600">
                        For questions, contact: <br>
                        <span class="font-medium">Asset Performance Fund LLC</span> at <a href="tel:4803342788" class="text-blue-600 hover:underline">480-334-2788</a>
                    </p>
                </div>
            </div>

            <!-- Recipient Info -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Recipient's Information</h2>
                <div class="space-y-1 text-gray-700">
                    <p class="font-medium">LUIS E.</p>
                    <p>8953 E CAPTAIN DREYFUS AVE</p>
                    <p>SCOTTSDALE, AZ 85260</p>
                    <p><span class="font-medium">Recipient's ID:</span> -7046</p>
                </div>
            </div>

        </div>

        <!-- Box 1: Interest Income -->
        <div class="p-6 bg-gray-50 border-t">
            <div class="form-box p-5 rounded">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Box 1: Interest Income</h3>
                        <p class="text-sm text-gray-600">Report all taxable interest income here.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="text-2xl font-bold text-green-700">$7,894.45</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Note -->
        <div class="bg-gray-800 text-white text-center py-3 text-xs">
            This document is for informational purposes only. Consult your tax advisor for official filing.
        </div>

    </div> --}}

    {{-- <div class="max-w-4xl mx-auto p-6 flex flex-col md:flex-row gap-8">
        <!-- Columna Izquierda: Payer & Recipient -->
        <div class="w-full md:w-1/2 space-y-4">
            <div>
                <p class="font-semibold">Payer's Name:</p>
                <p class="font-medium">Asset Performance Fund LLC</p>
                <p>423 N Creston Dr Ste 114</p>
                <p>Mesa, AZ 85213</p>
            </div>

            <div class="pt-8">
                <p class="font-semibold">Recipient's Name:</p>
                <p class="font-medium">{{ $tax->user->name }}</p>
                <p>{{ $tax->user->address }}</p>
                <p>{{ $tax->user->state->code }}, {{ $tax->user->zip_code }}</p>
            </div>
        </div>

        <!-- Columna Derecha: Form Info & Legal Notice -->
        <div class="w-full md:w-1/2 text-right md:text-left space-y-3">
            <p class="text-lg font-bold">2024 Form 1099-INT</p>
            <p class="font-medium">Interest Income</p>
            <p class="text-sm">OMB No. 1545-0112</p>
            <p class="font-semibold">Copy B — For Recipient</p>
            <p class="text-xs text-gray-700 leading-relaxed mt-4">
                This is important tax information and is being furnished to the Internal Revenue Service. If you are required to file a return, a negligence penalty or other sanction may be imposed on you if this income is taxable and the IRS determines that it has not been reported.
            </p>
            <p class="text-sm mt-4">
                For questions, contact: <br>
                <span class="font-medium">Asset Performance Fund LLC</span> at <span class="whitespace-nowrap">480-334-2788</span>
            </p>
        </div>

    </div>

    <!-- Recipient Info -->
    <table class="min-w-4xl mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-8">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    Payer's federal ID
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Recipient's ID
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Account number
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <td class="px-6 py-4 text-center">
                    99-4514077
                </td>
                <td class="px-6 py-4 t text-center">
                    @if ($tax->user->type == 'Person')
                        @php
                            $formatted = substr($tax->user->social_security, 0, 3) . '-' . substr($tax->user->social_security, 3, 2) . '-' . substr($tax->user->social_security, 5);
                        @endphp
                        {{ $formatted }}
                    @else
                    @php
                            $formatted = substr($tax->user->fin, 0, 2) . '-' . substr($tax->user->fin, 3);
                        @endphp
                        {{ $formatted }}
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $tax->user->id }}
                </td>
            </tr>
        </tbody>
    <table>


    <!-- Box 1: Interest Income -->
        <div class="max-w-4xl mx-auto p-6 border-2 mt-8 mb-4">
            <div class="form-box p-5 rounded">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Box 1: Interest Income</h3>
                        <p class="text-sm text-gray-600">Report all taxable interest income here.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="text-2xl font-bold">${{ $tax->earnings }}</span>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="p-2 md:p-4">

            <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">

                <!-- Header -->
                <div class="bg-gray-100 text-black p-5 text-center border-b-4 border-blue-900">
                    <h1 class="text-2xl font-bold">{{ $tax->year }} Form 1099-INT</h1>
                    <p class="text-gray-500 text-sm mt-1">Interest Income | OMB No. 1545-0112</p>
                    <p class="font-semibold mt-1">Copy B — For Recipient</p>
                </div>

                <!-- Legal Notice -->
                <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 text-sm leading-relaxed">
                    <strong>This is important tax information</strong> and is being furnished to the Internal Revenue Service. If you are required to file a return, a negligence penalty or other sanction may be imposed on you if this income is taxable and the IRS determines that it has not been reported.
                </div>

                <!-- Two Columns: Payer/Recipient + Contact Info -->
                <div class="p-6 grid md:grid-cols-2 gap-8">

                    <!-- Left Column -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">Payer's Information</h2>
                        <div class="text-gray-700 space-y-1">
                            <p class="font-medium">Asset Performance Fund LLC</p>
                            <p>423 N Creston Dr Ste 114</p>
                            <p>Mesa, AZ 85213</p>
                            <p><span class="font-medium">Payer's federal ID:</span> 99-4514077</p>
                        </div>

                        <div class="mt-8">
                            <h2 class="text-lg font-semibold text-gray-800 mb-3">Recipient's Information</h2>
                            <div class="text-gray-700 space-y-1">
                                <p class="font-medium">{{ $tax->user->name }}</p>
                                <p>{{ $tax->user->address }}</p>
                                <p>{{ $tax->user->state->code }}, {{ $tax->user->zip_code }}</p>
                                <p>
                                    <span class="font-medium">Recipient's ID:</span>
                                    @if ($tax->user->type == 'Person')
                                        @php
                                            $formatted = substr($tax->user->social_security, 0, 3) . '-' . substr($tax->user->social_security, 3, 2) . '-' . substr($tax->user->social_security, 5);
                                        @endphp
                                        {{ $formatted }}
                                    @else
                                    @php
                                            $formatted = substr($tax->user->fin, 0, 2) . '-' . substr($tax->user->fin, 3);
                                        @endphp
                                        {{ $formatted }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="text-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">Contact Information</h2>
                        <div>
                            <p><strong>For questions, contact:</strong></p>
                            <p class="font-medium">Asset Performance Fund LLC</p>
                            <p class="mt-1">Phone: <a href="tel:4803342788" class="text-blue-600 hover:underline">480-334-2788</a></p>
                        </div>
                    </div>

                </div>

                <!-- Box 1: Interest Income -->
                <div class="px-6 pb-6">
                    <div class="border border-gray-300 bg-gray-50 p-5 rounded">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Box 1: Interest Income</h3>
                                <p class="text-sm text-gray-600 mt-1">Report all taxable interest income here.</p>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <span class="text-2xl font-bold text-green-700">${{ $tax->earnings }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-100 text-black text-center py-3 text-xs">
                    This document is for informational purposes only. Consult your tax advisor for official filing.
                </div>

            </div>
        </div>

</div>

@push('js')
    <script>
        forms = document.querySelectorAll('.delete-form');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {

                e.preventDefault();

                Swal.fire({
                    title: {{ __('swal.Are you sure') }},
                    text: {{ _('swal.Cannot revert') }},
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: {{ __('swal.Yes, delete it') }},
                    cancelButtonText: {{ __('swal.Cancel') }},
                    }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush

</x-layouts.admin>