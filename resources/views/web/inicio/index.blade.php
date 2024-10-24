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

            @include('web.partials.celebracion')
        </div>


        <!-- Iterar sobre los planes de reserva -->
        <div class="planes-reserva">
            @foreach ($data_planes_reserva as $plan)
                <div class="plan">
                    <h3>{!! $plan->icono !!} {{ $plan->titulo }}</h3>

                    <!-- Decodificar y mostrar reservas si existen -->
                    @if (isset($plan->reservas) && is_array($plan->reservas))
                        @foreach ($plan->reservas as $reserva)
                            <div class="reserva">
                                <h4>{{ $reserva['titulo'] }}</h4>
                                <ul>
                                    @foreach ($reserva['lista'] as $item)
                                        <li>
                                            {!! $item['icono'] !!} {{ $item['subtitulo'] }}
                                            <p>{{ $item['descripcion'] }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>
                        @endforeach
                    @endif
                </div>
                <br>
            @endforeach
        </div>
    </div>
</x-web-layout>
