<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Configuration;
use Illuminate\Http\RedirectResponse;
use App\Data\ConfigurationData;
use App\Data\DimensionData;
use App\Data\DivisionData;
use App\Services\SvgDrawingService;

class HomeController extends Controller
{
    /**
     * Get the home page
     */
    public function index(): Response
    {
        $types = $this->getTypes();
        $materials = $this->getMaterials();

        return Inertia::render('Home', [
            'types' => $types,
            'materials' => $materials,
        ]);
    }

    /**
     * Get the presets for the type and material
     */
    public function presets($type, $material): Response
    {
        $presets = [];

        return Inertia::render('Presets', [
            'type' => $type,
            'material' => $material,
            'presets' => $presets,
        ]);
    }

    /**
     * Get the configuration
     */
    public function configuration(Configuration $configuration): Response
    {
        return Inertia::render('Configuration', [
            'configuration' => $configuration,
        ]);
    }

    /**
     * Get the technical svg
     */
    public function technical(Configuration $configuration)
    {
        $svgService = new SvgDrawingService();
        $scale = request()->get('scale', \App\Services\SvgDrawingService::DEFAULT_SCALE);
        $svg = $svgService->generateTechnicalSvg($configuration, (float) $scale);
        
        return response($svg)
            ->header('Content-Type', 'image/svg+xml');
    }

    /**
     * Get the visual svg
     */
    public function visual(Configuration $configuration)
    {
        $svgService = new SvgDrawingService();
        $scale = request()->get('scale', \App\Services\SvgDrawingService::DEFAULT_SCALE);
        $svg = $svgService->generateVisualSvg($configuration, (float) $scale);
        
        return response($svg)
            ->header('Content-Type', 'image/svg+xml');
    }




    /**
     * Start from scratch
     */
    public function startFromScratch($type, $material): RedirectResponse
    {
        if ($type === 'window frame') {
            $configuration = $this->windowFrameData()->toArray();
        } else {
            $configuration = [];
        }

        $configuration = Configuration::create([
            'material' => $material,
            'data' => $configuration,
        ]);

        return redirect()->route('configuration', $configuration->id);
    }

    /**
     * Get the types
     */
    public function getTypes(): array
    {
        return [
            'window frame',
            'door',
            'sliding door',
        ];
    }

    /**
     * Get the materials for the types
     */
    public function getMaterials(): array
    {
        return [
            'wood',
            'vinyl',
            'aluminum',
        ];
    }

    public function windowFrameData(): ConfigurationData
    {
        return ConfigurationData::from([
            'material' => 'wood',
            'dimensions' => new DimensionData(1000, 1000),
            'divisions' => [
                new DivisionData(
                    divisions: [],
                    options: [],
                    width: 864,
                    thickness: 68,
                    height: 864,
                ),
            ],
        ]);
    }
}