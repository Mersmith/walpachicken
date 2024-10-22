<x-web-layout>
    @section('tituloPagina', 'Navbar dinámico con subniveles')
    @section('descripcion', 'Descripción de la página')

    <div>
        <div class="navbar">
            <ul>
                @foreach ($menu_izquierda_sede as $nivel1)
                    <li>
                        <a href="#">{{ $nivel1['nombre'] }}</a>
                        @if (!empty($nivel1['submenu']))
                            <ul class="submenu">
                                @foreach ($nivel1['submenu'] as $nivel2)
                                    <li>
                                        <a href="#">{{ $nivel2['nombre'] }}</a>
                                        @if (!empty($nivel2['submenu']))
                                            <ul class="submenu">
                                                @foreach ($nivel2['submenu'] as $nivel3)
                                                    <li>
                                                        <a href="#">{{ $nivel3['nombre'] }}</a>
                                                        @if (!empty($nivel3['submenu']))
                                                            <ul class="submenu">
                                                                @foreach ($nivel3['submenu'] as $nivel4)
                                                                    <li>
                                                                        <a
                                                                            href="#">{{ $nivel4['nombre'] }}</a>
                                                                        @if (!empty($nivel4['submenu']))
                                                                            <ul class="submenu">
                                                                                @foreach ($nivel4['submenu'] as $nivel5)
                                                                                    <li>
                                                                                        <a
                                                                                            href="#">{{ $nivel5['nombre'] }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Contenido de la página -->
        <div class="content">
            <h1>Bienvenido a Nuestro Sitio Web</h1>
            <p>Aquí va el contenido de la página principal...</p>
        </div>
    </div>
</x-web-layout>
