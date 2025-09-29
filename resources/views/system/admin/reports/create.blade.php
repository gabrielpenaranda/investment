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
                {{ __('messages.New') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.reports.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.New Report') }}</p>
        <form action="{{ route('admin.reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Report Name') }}</flux:label>
                <flux:input name='name' placeholder="{{ __('messages.Enter the name') }}" value="{{ old('name') }}"/>
                <flux:error name="name" />
            </flux:field>
 
            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Year') }}</flux:label>
                <flux:input name='year' placeholder="{{ __('messages.Enter the year') }}" value="{{ old('year') }}"/>
                <flux:error name="year" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Month') }}</flux:label>
                <flux:input name='month' placeholder="{{ __('messages.Enter the month') }}" value="{{ old('year') }}"/>
                <flux:error name="month" />
            </flux:field>

            {{-- <flux:field>
                <label for="file" class="mt-2!">{{ __('messages.File') }}</label>
                <input type="file" style="display:none;" name='file' accept="application/pdf, application/x-pdf" value="{{ old('file') }}"/>
                <flux:error name="file" />
            </flux:field> --}}

            <!-- Campo: Archivo -->
            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.File') }}</flux:label>
                <div class="flex items-center space-x-4">
                    <!-- Input oculto para el archivo -->
                    <input type="file" id="file-input" name="file" accept="application/pdf, application/x-pdf" style="display: none;" />

                    <!-- Botón personalizado para cargar el archivo -->
                    <button
                        type="button"
                        onclick="document.getElementById('file-input').click()"
                        class="bg-azul-primary hover:bg-azul-secondary text-white px-4 py-2 rounded-lg font-medium transition"
                    >
                        {{ __('messages.Select File') }}
                    </button>

                    <!-- Texto que muestra el nombre del archivo seleccionado -->
                    {{-- <span id="file-name" class="text-gray-600">{{ __('messages.No file selected') }}</span> --}}
                </div>
                <flux:error name="file" />
            </flux:field>


            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">{{  __('messages.Send') }}</flux:button>
            </div>

        </form>
    </div>

</x-layouts.admin>