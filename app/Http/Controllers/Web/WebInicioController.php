<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\BeneficiosTrabajo;

class WebInicioController extends Controller
{
    public function __invoke()
    {
        $data_slider_principal_1 = $this->getWebSlidersPrincipal(1);

        $data_beneficios_trabajo_1 = $this->getWebBeneficiosTrabajo(1);

        return view('web.inicio.index',
            compact(
                'data_slider_principal_1',
                'data_beneficios_trabajo_1',
            ));
    }

    public function getWebSlidersPrincipal($id)
    {
        $sliders = Slider::where('id', $id)
            ->where('activo', true)
            ->first();
        if ($sliders) {
            $sliders->imagenes = json_decode($sliders->imagenes, true);
        } else {
            $sliders = null;
        }

        return $sliders;
    }
    
    public function getWebBeneficiosTrabajo($id)
    {
        $beneficios = BeneficiosTrabajo::where('id', $id)
            ->where('activo', true)
            ->first();
        if ($beneficios) {
            $beneficios->contenido = json_decode($beneficios->contenido, true);
        } else {
            $beneficios = null;
        }

        return $beneficios;
    }
}
