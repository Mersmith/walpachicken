<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Http\Controllers\Web\WebLayoutController;

class WebLayout extends Component
{
    public $menu_izquierda_sede;
    public $menu_derecha_sede;
    public $footer;

    /**
     * Create a new component instance.
     */
    public function __construct()
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

        $layoutController = new WebLayoutController();
        $this->menu_izquierda_sede = $layoutController->agregarSedesAMenu($menu_izquierda);
        $this->menu_derecha_sede = $layoutController->agregarSedesAMenuUbicacion($menu_derecha);

        $this->footer = $layoutController->getWebFooter(1);
    }   

    public function render(): View
    {
        return view('layouts.web.layout-web', [
            'menu_izquierda_sede' => $this->menu_izquierda_sede,
            'menu_derecha_sede' => $this->menu_derecha_sede,
            'footer' => $this->footer,
        ]);
    }

}
