<x-web-layout>
    @section('tituloPagina', '')
    @section('descripcion', '')

    <div>
        <div class="menu">
            <button id="sedesMenu">SEDES</button>
            <div id="sedesDropdown" class="dropdown-content" style="display: none;">
                @foreach ($data as $region)
                    @if (isset($region['region']))
                        <!-- Verifica que 'region' exista -->
                        <div class="region">
                            <strong>{{ $region['region']['nombre'] }}</strong>
                            <div class="provincia-dropdown">
                                @foreach ($region['region']['provincia'] as $provincia)
                                    @if (isset($provincia['nombre'], $provincia['distrito']))
                                        <!-- Verifica que 'nombre' y 'distrito' existan -->
                                        <div class="provincia">
                                            <span class="provincia-nombre">{{ $provincia['nombre'] }}</span>
                                            <div class="distrito-dropdown" style="display: none;">
                                                @foreach ($provincia['distrito'] as $distrito)
                                                    @if (isset($distrito['nombre'], $distrito['sedes']))
                                                        <!-- Verifica que 'nombre' y 'sedes' existan -->
                                                        <div class="distrito">
                                                            <em>{{ $distrito['nombre'] }}</em>
                                                            <ul>
                                                                @foreach ($distrito['sedes'] as $sede)
                                                                    @if (isset($sede['nombre']))
                                                                        <!-- Verifica que 'nombre' de la sede exista -->
                                                                        <li>{{ $sede['nombre'] }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <script>
            // Mostrar/Ocultar el menú de sedes
            document.getElementById('sedesMenu').addEventListener('click', function() {
                const dropdown = document.getElementById('sedesDropdown');
                dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none'; // Alternar visibilidad
            });

            // Mostrar/Ocultar el dropdown de provincias
            document.querySelectorAll('.provincia-nombre').forEach(provincia => {
                provincia.addEventListener('click', function() {
                    const distritoDropdown = this.nextElementSibling;
                    distritoDropdown.style.display = distritoDropdown.style.display === 'none' ? 'block' :
                        'none'; // Alternar visibilidad
                });
            });
        </script>

        <style>
            /* Estilos básicos para el menú */
            .menu {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                position: absolute;
                background-color: white;
                min-width: 200px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
                padding: 10px;
            }

            .region {
                margin: 10px 0;
            }

            .provincia {
                margin-left: 20px;
                cursor: pointer;
                /* Cambia el cursor para indicar que se puede hacer clic */
            }

            .distrito-dropdown {
                margin-left: 20px;
                display: none;
                /* Ocultar por defecto */
            }

            .distrito {
                margin-left: 20px;
            }
        </style>
    </div>
</x-web-layout>
