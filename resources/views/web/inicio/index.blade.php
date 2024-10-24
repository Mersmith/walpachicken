<x-web-layout>
    @section('tituloPagina', 'Navbar dinámico con subniveles')
    @section('descripcion', 'Descripción de la página')

    <div class="g_contenedor_pagina">
        @include('web.partials.slider-principal', ['p_elemento' => $data_slider_principal_1])

        <div class="g_centrar_pagina">
            @include('web.partials.social')

            @include('web.partials.beneficios', [
                'p_elemento' => $data_beneficios_trabajo_1,
            ])

            @include('web.partials.planes-reserva', [
                'p_elementos' => $data_planes_reserva,
            ])
        </div>


    </div>
</x-web-layout>
