<x-web-layout>
    @section('tituloPagina', '')
    @section('descripcion', '')

    <div>
        <div class="menu">
            <button id="sedesMenu">SEDES</button>
            <div id="sedesDropdown" class="dropdown-content" style="display: none;">
                @foreach ($data as $region)
                    @if (isset($region['region']))
                        <div class="region">
                            <strong class="region-nombre">{{ $region['region']['nombre'] }}</strong>
                            <div class="provincia-dropdown" style="display: none;">
                                @foreach ($region['region']['provincia'] as $provincia)
                                    @if (isset($provincia['nombre'], $provincia['distrito']))
                                        <div class="provincia">
                                            <span class="provincia-nombre">{{ $provincia['nombre'] }}</span>
                                            <div class="distrito-dropdown" style="display: none;">
                                                @foreach ($provincia['distrito'] as $distrito)
                                                    @if (isset($distrito['nombre'], $distrito['sedes']))
                                                        <div class="distrito">
                                                            <em class="distrito-nombre">{{ $distrito['nombre'] }}</em>
                                                            <ul class="sede-list" style="display: none;">
                                                                @foreach ($distrito['sedes'] as $sede)
                                                                    @if (isset($sede['nombre']))
                                                                        <li>
                                                                            <a href="{{ $sede['sede_id'] }}">{{ $sede['nombre'] }}</a>
                                                                        </li>
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

            // Mostrar/Ocultar el dropdown de provincias al hacer clic en la región
            document.querySelectorAll('.region-nombre').forEach(region => {
                region.addEventListener('click', function(event) {
                    event.stopPropagation(); // Evitar que el evento se propague
                    const provinciaDropdown = this.nextElementSibling;
                    // Alternar visibilidad
                    provinciaDropdown.style.display = provinciaDropdown.style.display === 'none' ? 'block' : 'none';
                    // Ocultar otros dropdowns
                    document.querySelectorAll('.provincia-dropdown').forEach(p => {
                        if (p !== provinciaDropdown) p.style.display = 'none';
                    });
                });
            });

            // Mostrar/Ocultar el dropdown de distritos al hacer clic en la provincia
            document.querySelectorAll('.provincia-nombre').forEach(provincia => {
                provincia.addEventListener('click', function(event) {
                    event.stopPropagation(); // Evitar que el evento se propague
                    const distritoDropdown = this.nextElementSibling;
                    // Alternar visibilidad
                    distritoDropdown.style.display = distritoDropdown.style.display === 'none' ? 'block' : 'none';
                    // Ocultar otros dropdowns de distritos
                    document.querySelectorAll('.distrito-dropdown').forEach(d => {
                        if (d !== distritoDropdown) d.style.display = 'none';
                    });
                });
            });

            // Mostrar/Ocultar las sedes al hacer clic en el distrito
            document.querySelectorAll('.distrito-nombre').forEach(distrito => {
                distrito.addEventListener('click', function(event) {
                    event.stopPropagation(); // Evitar que el evento se propague
                    const sedeList = this.nextElementSibling;
                    // Alternar visibilidad
                    sedeList.style.display = sedeList.style.display === 'none' ? 'block' : 'none';
                    // Ocultar otras listas de sedes
                    document.querySelectorAll('.sede-list').forEach(s => {
                        if (s !== sedeList) s.style.display = 'none';
                    });
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
            }

            .distrito-dropdown {
                margin-left: 20px;
                display: none;
            }

            .distrito {
                margin-left: 20px;
                cursor: pointer;
            }

            .sede-list {
                margin-left: 20px;
                display: none; /* Ocultar por defecto */
            }
        </style>
    </div>
</x-web-layout>
