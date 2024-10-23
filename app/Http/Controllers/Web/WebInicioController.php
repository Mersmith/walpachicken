<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class WebInicioController extends Controller
{
    public function __invoke()
    {
        $data_slider_principal_1 = $this->getEcommerceSlidersPrincipal(1);

        return view('web.inicio.index',
            compact(
                'data_slider_principal_1'
            ));
    }

    public function getEcommerceSlidersPrincipal($id)
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
}
