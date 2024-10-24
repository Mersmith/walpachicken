<div x-data="{ activePlan: 0 }" class="partials_contenedor_planes">
    <!-- Botones de planes -->
    <div class="botones_planes">
        @foreach ($p_elementos as $index => $plan)
            <button :class="{ 'active': activePlan === {{ $index }} }" @click="activePlan = {{ $index }}"
                class="boton_plan">
                {!! $plan->icono !!} {{ $plan->titulo }}
            </button>
        @endforeach
    </div>

    <!-- Contenido de planes -->
    @foreach ($p_elementos as $index => $plan)
        <div :class="activePlan === {{ $index }} ? 'plan_contenido_activo' : 'plan_contenido'">
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
                @endforeach
            @endif
        </div>
    @endforeach
</div>
