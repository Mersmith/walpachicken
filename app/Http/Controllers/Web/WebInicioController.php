<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Sede;

class WebInicioController extends Controller
{
    public function __invoke()
    {

        $menu = [
            [
                'id' => 1,
                'title' => 'Nuestra Carta',
                'submenu' => [
                    [
                        'id' => 2,
                        'title' => 'Región 1',
                        'submenu' => [
                            [
                                'id' => 3,
                                'title' => 'Provincia 1',
                                'submenu' => [
                                    [
                                        'id' => 4,
                                        'title' => 'Distrito 1',
                                        'submenu' => [
                                            ['id' => 5, 'title' => 'Sedes 1']
                                        ]
                                    ],
                                    [
                                        'id' => 6,
                                        'title' => 'Distrito 2',
                                        'submenu' => [
                                            ['id' => 7, 'title' => 'Sedes 1'],
                                            ['id' => 8, 'title' => 'Sedes 2'],
                                            ['id' => 9, 'title' => 'Sedes 3']
                                        ]
                                    ]
                                ]
                            ],
                            [
                                'id' => 10,
                                'title' => 'Provincia 2',
                                'submenu' => [
                                    [
                                        'id' => 11,
                                        'title' => 'Distrito 1',
                                        'submenu' => [
                                            ['id' => 12, 'title' => 'Sedes 1']
                                        ]
                                    ],
                                    [
                                        'id' => 13,
                                        'title' => 'Distrito 2',
                                        'submenu' => [
                                            ['id' => 14, 'title' => 'Sedes 1'],
                                            ['id' => 15, 'title' => 'Sedes 2'],
                                            ['id' => 16, 'title' => 'Sedes 3']
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 17,
                        'title' => 'Región 2',
                        'submenu' => [
                            [
                                'id' => 18,
                                'title' => 'Provincia 2',
                                'submenu' => [
                                    [
                                        'id' => 19,
                                        'title' => 'Distrito 2',
                                        'submenu' => [
                                            ['id' => 20, 'title' => 'Sedes 1'],
                                            ['id' => 21, 'title' => 'Sedes 2']
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => 22,
                'title' => 'Promociones',
                'submenu' => [
                    [
                        'id' => 23,
                        'title' => 'Región 1',
                        'submenu' => [
                            [
                                'id' => 24,
                                'title' => 'Provincia 1',
                                'submenu' => [
                                    [
                                        'id' => 25,
                                        'title' => 'Distrito 1',
                                        'submenu' => [
                                            ['id' => 26, 'title' => 'Sedes 1']
                                        ]
                                    ],
                                    [
                                        'id' => 27,
                                        'title' => 'Distrito 2',
                                        'submenu' => [
                                            ['id' => 28, 'title' => 'Sedes 1'],
                                            ['id' => 29, 'title' => 'Sedes 2'],
                                            ['id' => 30, 'title' => 'Sedes 3']
                                        ]
                                    ]
                                ]
                            ],
                            [
                                'id' => 31,
                                'title' => 'Provincia 2',
                                'submenu' => [
                                    [
                                        'id' => 32,
                                        'title' => 'Distrito 1',
                                        'submenu' => [
                                            ['id' => 33, 'title' => 'Sedes 1']
                                        ]
                                    ],
                                    [
                                        'id' => 34,
                                        'title' => 'Distrito 2',
                                        'submenu' => [
                                            ['id' => 35, 'title' => 'Sedes 1'],
                                            ['id' => 36, 'title' => 'Sedes 2'],
                                            ['id' => 37, 'title' => 'Sedes 3']
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 38,
                        'title' => 'Región 2',
                        'submenu' => [
                            [
                                'id' => 39,
                                'title' => 'Provincia 2',
                                'submenu' => [
                                    [
                                        'id' => 40,
                                        'title' => 'Distrito 2',
                                        'submenu' => [
                                            ['id' => 41, 'title' => 'Sedes 1'],
                                            ['id' => 42, 'title' => 'Sedes 2']
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => 43,
                'title' => 'Catering',
                'submenu' => []
            ]
        ];


        //$data = $this->getWebSedesPorRegionProvinciaDistrito();

        // dd($data);

        return view('web.inicio.index', ['menu' => $menu]);
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
                'region' => [
                    'region_id' => $region->id,
                    'nombre' => $region->nombre,
                    'provincia' => $region->provincias->map(function ($provincia) {
                        return [
                            'provincia_id' => $provincia->id,
                            'nombre' => $provincia->nombre,
                            'distrito' => $provincia->distritos->map(function ($distrito) {
                                return [
                                    'distrito_id' => $distrito->id,
                                    'nombre' => $distrito->nombre,
                                    'sedes' => $distrito->sedes->map(function ($sede) {
                                        return [
                                            'sede_id' => $sede->id,
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

}