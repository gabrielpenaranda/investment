<x-layouts.admin>

    <div class="mb-4">
        @livewire('system.language-selector')
    </div>

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Account Statement') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        @can('admin.investments.index')
            <a href="{{ route('admin.investments.index') }}" class="btn btn-danger">{{ __('messages.Return') }}</a>
        @endcan
    </div>
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <p class="text-2xl mb-4">{{  __('messages.Account Statement') }}</p>

    <p>{{ $investment->user->name }}</p>
    <p>{{ $investment->user->address }}, {{ $investment->user->state->code }}</p>
    <p>{{ $investment->user->zip_code }}</p>


    @livewire('system.admin.account-statement-index', ['investment' => $investment])

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
                    cancelButtonText: "{{ __('swal.Cancel') }}",
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