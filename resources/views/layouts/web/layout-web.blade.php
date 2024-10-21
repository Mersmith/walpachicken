<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--META TAGS-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('descripcion')">

    <!--TITULO-->
    <title>@yield('tituloPagina')</title>

    <!-- SCRIPTS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- STYLES -->
    @livewireStyles
</head>

<body>
    <!--MENU PRINCIPAL-->
    @include('layouts.web.menu.menu')

    <!--CONTENEDOR LAYOUT GENERAL-->
    <main>
        @yield('content')
        @if (isset($slot))
            {{ $slot }}
        @endif
    </main>

    @include('layouts.web.footer.footer', [
        'p_elementos' => $footer,
    ])

    <!--SCRIPTS-->
    @stack('modals')
    @livewireScripts
    @stack('script')
</body>

</html>
