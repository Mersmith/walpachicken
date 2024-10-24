@if ($p_elementos)
    <div class="footer">
        <div class="contenedor_informacion" x-data="dataEcommerceFooter()">
            <div class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Tendencias Market" class="imagen_logo_computadora" />
            </div>

            <div class="enlaces">
                <!-- PRIMERA COLUMNA -->
                @if (!empty($p_elementos->primera_columna))
                    <div class="columna">
                        <div @click="toggleAccordion(1)" class="contenedor_titulo">
                            <h3>{{ $p_elementos->primera_columna['titulo'] }}</h3>
                            <span class="contenedor_control" x-text="itemIndex === 1 ? '-' : '+'"></span>
                        </div>
                        <ul class="contenedor_acordeon" :class="{ 'mostrar': itemIndex === 1 }">
                            @foreach ($p_elementos->primera_columna['elementos'] as $elemento)
                                <li><a href="{{ $elemento['link'] }}">{{ $elemento['nombre'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- SEGUNDA COLUMNA -->
                @if (!empty($p_elementos->segunda_columna))
                    <div class="columna">
                        <div @click="toggleAccordion(2)" class="contenedor_titulo">
                            <h3>{{ $p_elementos->segunda_columna['titulo'] }}</h3>
                            <span class="contenedor_control" x-text="itemIndex === 2 ? '-' : '+'"></span>
                        </div>
                        <ul class="contenedor_acordeon" :class="{ 'mostrar': itemIndex === 2 }">
                            @foreach ($p_elementos->segunda_columna['elementos'] as $elemento)
                                <li><a href="{{ $elemento['link'] }}">{{ $elemento['nombre'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- TERCERA COLUMNA -->
                @if (!empty($p_elementos->tercera_columna))
                    <div class="columna">
                        <div @click="toggleAccordion(3)" class="contenedor_titulo">
                            <h3>{{ $p_elementos->tercera_columna['titulo'] }}</h3>
                            <span class="contenedor_control" x-text="itemIndex === 3 ? '-' : '+'"></span>
                        </div>
                        <ul class="contenedor_acordeon" :class="{ 'mostrar': itemIndex === 3 }">
                            @foreach ($p_elementos->tercera_columna['elementos'] as $elemento)
                                <li><a href="{{ $elemento['link'] }}">{{ $elemento['nombre'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- CUARTA COLUMNA -->
                @if (!empty($p_elementos->cuarta_columna))
                    <div class="columna">
                        <div @click="toggleAccordion(4)" class="contenedor_titulo">
                            <h3>{{ $p_elementos->cuarta_columna['titulo'] }}</h3>
                            <span class="contenedor_control" x-text="itemIndex === 4 ? '-' : '+'"></span>
                        </div>
                        <ul class="contenedor_acordeon" :class="{ 'mostrar': itemIndex === 4 }">
                            @foreach ($p_elementos->cuarta_columna['elementos'] as $elemento)
                                <li><a href="{{ $elemento['link'] }}">{{ $elemento['nombre'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <!-- CONTENEDOR DERECHOS -->
        <div class="contenedor_derechos">
            <p>{{ $p_elementos->derechos }}</p>
        </div>
    </div>

    <script>
        function dataEcommerceFooter() {
            return {
                itemIndex: null,
                toggleAccordion(index) {
                    // Si el índice actual está abierto, ciérralo, de lo contrario, abre el nuevo.
                    if (this.itemIndex === index) {
                        this.itemIndex = null;
                    } else {
                        this.itemIndex = index;
                    }
                }
            }
        }
    </script>
@endif
