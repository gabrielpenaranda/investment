<x-layouts.admin :title="__('Dashboard')">
    @livewire('system.language-selector')

    {{-- <div class="flex items-center justify-center min-h-screen bg-white">
        <img 
            src="{{ asset('images/Logo APF color.png') }}" 
            alt="Logo" 
            class="w-48 md:w-64 lg:w-80 transition-all duration-300"
        />
    </div> --}}

    <div class="flex items-center justify-center min-h-screen bg-white px-4">
    <img 
        src="{{ asset('images/Logo APF color.png') }}" 
        alt="Logo"
        class="w-64 md:w-80 lg:w-96 h-auto transition-all duration-500 ease-in-out"
    />
</div>
</x-layouts.admin>