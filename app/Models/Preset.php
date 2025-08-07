<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preset extends Model
{
    protected $fillable = ['name', 'type', 'data'];

    protected $casts = [
        'data' => 'array',
    ];

    public function getSvg(string $type = 'visual'): string
    {
        $svgService = new \App\Services\SvgDrawingService();
        
        // Create a temporary configuration from preset data
        $configuration = new \App\Models\Configuration();
        $configuration->material = $this->type ?? 'wood';
        $configuration->data = $this->data;
        
        return match ($type) {
            'technical' => $svgService->generateTechnicalSvg($configuration),
            'visual' => $svgService->generateVisualSvg($configuration),
            default => $svgService->generateVisualSvg($configuration),
        };
    }
}
