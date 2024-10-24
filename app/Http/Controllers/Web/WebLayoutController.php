<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Provincia;
use App\Models\Region;
use App\Models\WebFooter;

class WebLayoutController extends Controller
{
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
                            },
                        ]);
                },
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
                                            'nombre' => $sede->nombre,
                                        ];
                                    }),
                                ];
                            }),
                        ];
                    }),
                ],
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
                },
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
                                    'nombre' => $sede->nombre,
                                ];
                            }),
                        ];
                    }),
                ],
            ];
        });

        return $estructuraAnidada;
    }

    public function getWebSedesPorRegionDistrito()
    {
        // Traemos las regiones que tienen distritos con sedes, sin incluir las provincias.
        $regiones = Region::whereHas('provincias.distritos.sedes') // Filtrar para traer solo donde haya sedes
            ->with([
                'provincias.distritos' => function ($query) {
                    $query->whereHas('sedes') // Filtrar distritos donde haya sedes
                        ->with('sedes'); // Traer las sedes de los distritos
                },
            ])
            ->get();

        // Estructuramos los datos en el formato solicitado (región -> distrito -> sede)
        $estructuraAnidada = $regiones->map(function ($region) {
            return [
                'submenu' => [
                    'id' => $region->id,
                    'nombre' => $region->nombre,
                    'submenu' => $region->provincias->flatMap(function ($provincia) {
                        return $provincia->distritos->map(function ($distrito) {
                            return [
                                'id' => $distrito->id,
                                'nombre' => $distrito->nombre,
                                'submenu' => $distrito->sedes->map(function ($sede) {
                                    return [
                                        'id' => $sede->id,
                                        'nombre' => $sede->nombre,
                                    ];
                                }),
                            ];
                        });
                    }),
                ],
            ];
        });

        return $estructuraAnidada;
    }

    public function agregarSedesAMenu($menu)
    {
        $sedes = $this->getWebSedesPorRegionDistrito();

        foreach ($sedes as $item) {
            $menu[0]['submenu'][] = $item['submenu']; // 1er nivel
            $menu[1]['submenu'][] = $item['submenu']; // 2do nivel
        }

        return $menu;
    }

    public function agregarSedesAMenuUbicacion($menu)
    {
        $sedes = $this->getWebSedesPorRegionDistrito();

        foreach ($sedes as $item) {
            $menu[0]['submenu'][] = $item['submenu']; // 1er nivel
        }

        return $menu;
    }

    public function getWebFooter($id)
    {
        $footer = WebFooter::where('id', $id)
            ->where('activo', true)
            ->first();

        if ($footer) {
            $footer->primera_columna = json_decode($footer->primera_columna, true);
            $footer->segunda_columna = json_decode($footer->segunda_columna, true);
            $footer->tercera_columna = json_decode($footer->tercera_columna, true);
            $footer->cuarta_columna = json_decode($footer->cuarta_columna, true);
        } else {
            $footer = null;
        }

        return $footer;
    }

}
