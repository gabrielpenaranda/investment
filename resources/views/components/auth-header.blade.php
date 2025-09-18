@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center">
    <div class="mb-8">
        @livewire('system.language-selector')
    </div>
    <flux:heading size="xl">{{ $title }}</flux:heading>
    <flux:subheading>{{ $description }}</flux:subheading>
</div>
