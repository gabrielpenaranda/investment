<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="font-figtree antialiased text-gray-800 bg-black">

        {{ $slot }}

        @fluxScripts
    </body>
</html>
