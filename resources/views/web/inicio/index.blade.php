<x-web-layout>
    @section('tituloPagina', 'Navbar dinámico con subniveles')
    @section('descripcion', 'Descripción de la página')

    <div x-data="{ menuAbierto: false }">
        <!-- NAVBAR -->
        <div class="navbar">
            <!-- LOGO -->
            <div class="logo">
                <!-- HAMBURGUESA -->
                <span class="icono_hamburguesa" @click="menuAbierto = true">
                    <p>H</p>
                </span>

                <!-- IMAGEN -->
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Tendencias Market"
                        class="imagen_logo_computadora" />
                </a>
            </div>           

            <!-- MENU -->
            <div class="contenedor_menu" :class="{ 'contenedor_menu_abierto': menuAbierto }" x-transition>
                <!-- CERRAR -->
                <span class="icono_cerrar" @click="menuAbierto = false">
                    x
                </span>

                <!-- MENU -->
                <div class="menu">
                    <div class="menu_izquierda">
                        <ul class="menu_nivel_1">
                            @foreach ($menu_izquierda_sede as $nivel1)
                                <li>
                                    <a href="#">{{ $nivel1['nombre'] }}</a>
                                    @if (!empty($nivel1['submenu']))
                                        <ul class="menu_nivel_2 submenu">
                                            @foreach ($nivel1['submenu'] as $nivel2)
                                                <li>
                                                    <a href="#">{{ $nivel2['nombre'] }}</a>
                                                    @if (!empty($nivel2['submenu']))
                                                        <ul class="menu_nivel_3 submenu">
                                                            @foreach ($nivel2['submenu'] as $nivel3)
                                                                <li>
                                                                    <a href="#">{{ $nivel3['nombre'] }}</a>
                                                                    @if (!empty($nivel3['submenu']))
                                                                        <ul class="menu_nivel_4 submenu">
                                                                            @foreach ($nivel3['submenu'] as $nivel4)
                                                                                <li>
                                                                                    <a href="#">{{ $nivel4['nombre'] }}</a>
                                                                                    @if (!empty($nivel4['submenu']))
                                                                                        <ul class="menu_nivel_5 submenu">
                                                                                            @foreach ($nivel4['submenu'] as $nivel5)
                                                                                                <li>
                                                                                                    <a href="#">{{ $nivel5['nombre'] }}</a>
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

                    <div class="menu_derecha">
                        <div>
                            <p>ELIGE TU EXPERIENCIA:</p>
                        </div>

                        <div>
                            <p>¡RESERVA ONLINE!</p>
                        </div>

                        <div>
                            <p>MI UBICACIÓN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido de la página -->
        <div class="content">
            <h1>Bienvenido a Nuestro Sitio Web</h1>
            <br><br><br><br><br><br><br><br><br>
            <p>Aquí va el contenido de la página principal...</p>
        </div>
    </div>
</x-web-layout>