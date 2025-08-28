<x-layouts.app.admin :title="$title ?? null">
    <flux:main>
        {{ $slot }}
    </flux:main>

    @stack('js')

    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif
    
</x-layouts.app.admin>
