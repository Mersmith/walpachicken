<x-web-layout>
    @section('tituloPagina', 'Navbar dinámico con subniveles')
    @section('descripcion', 'Descripción de la página')

    <div class="g_contenedor_pagina">
        @include('web.partials.slider-principal', ['p_elemento' => $data_slider_principal_1])
    </div>
</x-web-layout>
