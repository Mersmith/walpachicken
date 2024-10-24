@if ($p_elementos)
    <div class="footer">
        <div class="contenedor_informacion">
            <div class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Tendencias Market" class="imagen_logo_computadora" />
            </div>

            <div class="enlaces">
                @if (!empty($p_elementos->primera_columna))
                    <div class="columna">
                        <h3>{{ $p_elementos->primera_columna['titulo'] }}</h3>
                        <ul>
                            @foreach ($p_elementos->primera_columna['elementos'] as $elemento)
                                <li><a href="{{ $elemento['link'] }}">{{ $elemento['nombre'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (!empty($p_elementos->segunda_columna))
                    <div class="columna">
                        <h3>{{ $p_elementos->segunda_columna['titulo'] }}</h3>
                        <ul>
                            @foreach ($p_elementos->segunda_columna['elementos'] as $elemento)
                                <li><a href="{{ $elemento['link'] }}">{{ $elemento['nombre'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (!empty($p_elementos->tercera_columna))
                    <div class="columna">
                        <h3>{{ $p_elementos->tercera_columna['titulo'] }}</h3>
                        <ul>
                            @foreach ($p_elementos->tercera_columna['elementos'] as $elemento)
                                <li><a href="{{ $elemento['link'] }}">{{ $elemento['nombre'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (!empty($p_elementos->cuarta_columna))
                    <div class="columna">
                        <h3>{{ $p_elementos->cuarta_columna['titulo'] }}</h3>
                        <ul>
                            @foreach ($p_elementos->cuarta_columna['elementos'] as $elemento)
                                <li><a href="{{ $elemento['link'] }}">{{ $elemento['nombre'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="contenedor_derechos">
            <p>{{ $p_elementos->derechos }}</p>
        </div>
    </div>
@endif
