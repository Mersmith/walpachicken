<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Provincia;
use App\Models\Region;

class WebInicioController extends Controller
{
    public function __invoke()
    {
        $menu_izquierda = [
            [
                'id' => 1,
                'nombre' => 'NUESTRA CARTA',
                'submenu' => []
            ],
            [
                'id' => 22,
                'nombre' => 'PROMOCIONES',
                'submenu' => []
            ],
            [
                'id' => 43,
                'nombre' => 'CATERING',
                'submenu' => []
            ]
        ];

        $menu_derecha = [
            [
                'id' => 1,
                'nombre' => 'MI UBICACIÓN',
                'submenu' => []
            ]
        ];

        $menu_izquierda_sede = $this->agregarSedesAMenu($menu_izquierda);
        $menu_derecha_sede = $this->agregarSedesAMenuUbicacion($menu_derecha);

        //dd($menu_derecha_sede);

        return view('web.inicio.index', [
            'menu_izquierda_sede' => $menu_izquierda_sede,
            'menu_derecha_sede' => $menu_derecha_sede
        ]);
    }

    public function getWebSedesPorRegionProvinciaDistrito()
    {
        // Traemos las regiones que tienen provincias con distritos que a su vez tienen sedes.
        $regiones = Region::whereHas('provincias.distritos.sedes') // Filtrar para traer solo donde haya sedes
            ->with([
                'provincias' => function ($query) {
                    $query->whereHas('distritos.sedes') // Filtrar provincias donde haya distritos con sedes
                        ->with([
                            'distritos' => function ($query) {
                                $query->whereHas('sedes'); // Filtrar distritos donde haya sedes
                            }
                        ]);
                }
            ])
            ->get();

        // Estructuramos los datos en el formato solicitado
        $estructuraAnidada = $regiones->map(function ($region) {
            return [
                'submenu' => [
                    'id' => $region->id,
                    'nombre' => $region->nombre,
                    'submenu' => $region->provincias->map(function ($provincia) {
                        return [
                            'id' => $provincia->id,
                            'nombre' => $provincia->nombre,
                            'submenu' => $provincia->distritos->map(function ($distrito) {
                                return [
                                    'id' => $distrito->id,
                                    'nombre' => $distrito->nombre,
                                    'submenu' => $distrito->sedes->map(function ($sede) {
                                        return [
                                            'id' => $sede->id,
                                            'nombre' => $sede->nombre
                                        ];
                                    })
                                ];
                            })
                        ];
                    })
                ]
            ];
        });

        return $estructuraAnidada;
    }

    public function getWebSedesPorProvinciaDistrito()
    {
        // Traemos las provincias que tienen distritos que a su vez tienen sedes.
        $provincias = Provincia::whereHas('distritos.sedes') // Filtrar para traer solo donde haya sedes
            ->with([
                'distritos' => function ($query) {
                    $query->whereHas('sedes'); // Filtrar distritos donde haya sedes
                }
            ])
            ->get();

        // Estructuramos los datos en el formato solicitado
        $estructuraAnidada = $provincias->map(function ($provincia) {
            return [
                'submenu' => [
                    'id' => $provincia->id,
                    'nombre' => $provincia->nombre,
                    'submenu' => $provincia->distritos->map(function ($distrito) {
                        return [
                            'id' => $distrito->id,
                            'nombre' => $distrito->nombre,
                            'submenu' => $distrito->sedes->map(function ($sede) {
                                return [
                                    'id' => $sede->id,
                                    'nombre' => $sede->nombre
                                ];
                            })
                        ];
                    })
                ]
            ];
        });

        return $estructuraAnidada;
    }

    public function agregarSedesAMenu($menu)
    {
        $sedes = $this->getWebSedesPorRegionProvinciaDistrito();

        foreach ($sedes as $item) {
            $menu[0]['submenu'][] = $item['submenu']; // 1er nivel
            $menu[1]['submenu'][] = $item['submenu']; // 2do nivel
        }

        return $menu;
    }

    public function agregarSedesAMenuUbicacion($menu)
    {
        $sedes = $this->getWebSedesPorRegionProvinciaDistrito();

        foreach ($sedes as $item) {
            $menu[0]['submenu'][] = $item['submenu']; // 1er nivel
        }

        return $menu;
    }

}