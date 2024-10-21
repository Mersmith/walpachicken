<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Sede;

class WebInicioController extends Controller
{
    public function __invoke()
    {
        $data = $this->getWebSedesPorRegionProvinciaDistrito();

        // dd($data);

        return view('web.inicio.index', ['data' => $data]);
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