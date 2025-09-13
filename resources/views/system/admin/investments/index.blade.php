<x-layouts.admin>

    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Investments') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        @can('admin.investments.create')
            <a href="{{ route('admin.investments.create') }}" class="btn btn-primary">{{ __('messages.New Investment') }}</a>
        @endcan
    </div>
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <p class="text-2xl mb-4">{{  __('messages.List of Investments') }}</p>

    @livewire('system.admin.investments-index')

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

    <script>
        function confirmarCierre(url) {
            Swal.fire({
                title: "{{ __('swal.confirm_close_title') }}",
                text: "{{ __('swal.confirm_close_text') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('swal.confirm_button') }}",
                cancelButtonText: "{{ __('swal.cancel_button') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirigir al enlace (GET) o enviar un formulario (si es POST)
                    window.location.href = url;
                }
            });
        }
    </script>
@endpush

</x-layouts.admin>