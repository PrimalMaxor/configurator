<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $types = $this->getTypes();
        $materials = $this->getMaterials();

        return Inertia::render('Home', [
            'types' => $types,
            'materials' => $materials,
        ]);
    }

    public function getTypes()
    {
        return [
            'window frame',
            'door',
            'sliding door',
        ];
    }

    public function getMaterials()
    {
        return [
            'wood',
            'vinyl',
            'aluminum',
        ];
    }
}