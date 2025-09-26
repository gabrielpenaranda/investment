<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="font-sans antialiased text-gray-800 bg-white">

        {{ $slot }}

        @fluxScripts
    </body>
</html>
