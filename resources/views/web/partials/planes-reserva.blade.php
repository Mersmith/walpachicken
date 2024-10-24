<div class="partials_contenedor_planes">
    @foreach ($p_elementos as $plan)
        <div class="plan">
            <h3>{!! $plan->icono !!} {{ $plan->titulo }}</h3>

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
