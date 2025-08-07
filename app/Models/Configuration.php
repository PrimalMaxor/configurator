<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = ['material', 'type', 'data'];

    protected $casts = [
        'data' => 'array',
    ];

    public function getSvg(string $type = 'visual'): string
    {
        $svgService = new \App\Services\SvgDrawingService();
        
        return match ($type) {
            'technical' => $svgService->generateTechnicalSvg($this),
            'visual' => $svgService->generateVisualSvg($this),
            default => $svgService->generateVisualSvg($this),
        };
    }
}
