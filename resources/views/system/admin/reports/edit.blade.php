<x-layouts.admin>

    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.reports.index') }}">
                {{ __('messages.Reports') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.Edit') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.reports.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.Edit Report') }}</p>
        <form action="{{ route('admin.reports.update', $report) }}" method="POST">
            @csrf
            @method('PUT')

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Report Name') }}</flux:label>
                <flux:input name='name' placeholder="{{ __('messages.Enter the name') }}" value="{{ old('name', $report->name) }}"/>
                <flux:error name="name" />
            </flux:field>
 
            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Year') }}</flux:label>
                <flux:input name='year' placeholder="{{ __('messages.Enter the year') }}" value="{{ old('year', $report->year) }}"/>
                <flux:error name="year" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Month') }}</flux:label>
                <flux:input name='month' placeholder="{{ __('messages.Enter the month') }}" value="{{ old('year', $report->month) }}"/>
                <flux:error name="month" />
            </flux:field>

            <!-- Input oculto: valor por defecto cuando NO está marcado -->
            <input type="hidden" name="published" value="0">
            
            <input 
                type="checkbox" 
                name="published"
                value="1"
                {{ old('published', $report->published) ? 'checked' : '' }}
                class="rounded border-gray-300 text-zinc-600 shadow-sm mt-4"
            >
            <span class="text-sm text-zinc-700 mt-4">{{ __('messages.Published') }}?</span>
            </label>

            {{-- <flux:field>
                <label for="file" class="mt-2!">{{ __('messages.File') }}</label>
                <input type="file" style="display:none;" name='file' accept="application/pdf, application/x-pdf" value="{{ old('file') }}"/>
                <flux:error name="file" />
            </flux:field> --}}

            <!-- Campo: Archivo -->


            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">{{  __('messages.Send') }}</flux:button>
            </div>

        </form>
    </div>

</x-layouts.admin>