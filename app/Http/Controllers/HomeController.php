<?php

namespace App\Http\Controllers;

use App\Materials;
use App\Models\StaticPage;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $homepage = StaticPage::homepage();
        
        return Inertia::render('Home', [
            'homepage' => $homepage ? [
                'title' => $homepage->title,
                'description' => $homepage->description,
                'content' => $homepage->content,
                'main_image' => $homepage->main_image,
            ] : null,
        ]);
    }
}
