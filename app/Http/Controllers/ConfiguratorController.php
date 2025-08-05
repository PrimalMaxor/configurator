<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\SvgGeneratorService;
use Inertia\Inertia;

class ConfiguratorController extends Controller
{
    protected SvgGeneratorService $svgGenerator;

    public function __construct(SvgGeneratorService $svgGenerator)
    {
        $this->svgGenerator = $svgGenerator;
    }

    public function index()
    {
        // Get main categories with their sub-categories
        $categories = Category::mainCategories()
            ->with('subCategories')
            ->ordered()
            ->active()
            ->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'sub_categories' => $category->subCategories->map(function ($subCategory) {
                        return [
                            'id' => $subCategory->id,
                            'name' => $subCategory->name,
                            'slug' => $subCategory->slug,
                        ];
                    }),
                ];
            });
        
        return Inertia::render('Configurator', [
            'categories' => $categories,
        ]);
    }

    public function configure($frameType)
    {
        $categories = Category::mainCategories()
            ->with('subCategories')
            ->ordered()
            ->active()
            ->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'sub_categories' => $category->subCategories->map(function ($subCategory) {
                        return [
                            'id' => $subCategory->id,
                            'name' => $subCategory->name,
                            'slug' => $subCategory->slug,
                        ];
                    }),
                ];
            });

        $frameConfig = $this->getDefaultConfig($frameType);
        
        // Generate SVG based on the configuration
        $svg = $this->svgGenerator->generateFrameSvg($frameConfig);
        
        return Inertia::render('ConfiguratorConfigure', [
            'categories' => $categories,
            'frameType' => $frameType,
            'frameConfig' => $frameConfig,
            'svg' => $svg,
        ]);
    }

    private function getDefaultConfig($frameType)
    {
        switch ($frameType) {
            case 'window':
                return [
                    'dimensions' => [
                        'width' => 1000,
                        'height' => 1000,
                        'thickness' => 68,
                    ],
                    'dividers' => [
                        'width' => 864,
                        'height' => 864,
                        'type' => 'window',
                    ],
                ];
            case 'door':
                return [
                    'dimensions' => [
                        'width' => 1000,
                        'height' => 2000,
                        'thickness' => 68,
                    ],
                    'dividers' => [
                        'thickness' => 20,
                        'width' => 824,
                        'height' => 1824,
                        'type' => 'door',
                    ],
                ];
            case 'sliding':
                return [
                    'dimensions' => [
                        'width' => 3000,
                        'height' => 2000,
                        'thickness' => 68,
                    ],
                    'dividers' => [
                        'thickness' => 20,
                        'width' => 2824,
                        'height' => 1824,
                        'type' => 'sliding-door',
                    ],
                ];
        }   
    }
} 