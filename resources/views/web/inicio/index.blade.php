<x-web-layout>
    @section('tituloPagina', 'Navbar dinámico con subniveles')
    @section('descripcion', 'Descripción de la página')

    <div>
        <div class="navbar">
            <ul>
                @foreach ($menu as $item)
                    <li>
                        <a href="#">{{ $item['title'] }}</a>
                        @if (!empty($item['submenu']))
                            <ul class="submenu">
                                @foreach ($item['submenu'] as $submenuItem)
                                    <li>
                                        <a href="#">{{ $submenuItem['title'] }}</a>
                                        @if (!empty($submenuItem['submenu']))
                                            <ul class="submenu">
                                                @foreach ($submenuItem['submenu'] as $subsubmenuItem)
                                                    <li>
                                                        <a href="#">{{ $subsubmenuItem['title'] }}</a>
                                                        @if (!empty($subsubmenuItem['submenu']))
                                                            <ul class="submenu">
                                                                @foreach ($subsubmenuItem['submenu'] as $subsubsubmenuItem)
                                                                    <li>
                                                                        <a
                                                                            href="#">{{ $subsubsubmenuItem['title'] }}</a>
                                                                        @if (!empty($subsubsubmenuItem['submenu']))
                                                                            <ul class="submenu">
                                                                                @foreach ($subsubsubmenuItem['submenu'] as $subsubsubsubmenuItem)
                                                                                    <li>
                                                                                        <a
                                                                                            href="#">{{ $subsubsubsubmenuItem['title'] }}</a>
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
