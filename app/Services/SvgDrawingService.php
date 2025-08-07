<?php

namespace App\Services;

use App\Data\ConfigurationData;
use App\Data\DivisionData;
use App\Models\Configuration;

class SvgDrawingService
{
    private const SVG_NAMESPACE = 'http://www.w3.org/2000/svg';
    private const DEFAULT_STROKE_WIDTH = 3;
    private const DEFAULT_FILL = 'none';
    private const DEFAULT_STROKE = '#000000';
    public const DEFAULT_SCALE = 0.4;

    /**
     * Generate technical SVG for a configuration
     */
    public function generateTechnicalSvg(Configuration $configuration, float $scale = null): string
    {
        $configData = ConfigurationData::from($configuration->data);
        $scale = $scale ?? self::DEFAULT_SCALE;
        
        $svg = $this->createSvgElement($configData->dimensions->width, $configData->dimensions->height, $scale);
        
        // Add technical drawing elements
        $this->addTechnicalElements($svg, $configData);
        
        return $this->formatSvg($svg);
    }

    /**
     * Generate visual SVG for a configuration
     */
    public function generateVisualSvg(Configuration $configuration, float $scale = null): string
    {
        $configData = ConfigurationData::from($configuration->data);
        $scale = $scale ?? self::DEFAULT_SCALE;
        
        $svg = $this->createSvgElement($configData->dimensions->width, $configData->dimensions->height, $scale);
        
        // Add visual elements based on material
        $this->addVisualElements($svg, $configData, $configuration->material);
        
        return $this->formatSvg($svg);
    }

    /**
     * Create the main SVG element
     */
    private function createSvgElement(int $width, int $height, float $scale = 1.0): \DOMElement
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $svg = $dom->createElementNS(self::SVG_NAMESPACE, 'svg');
        $svg->setAttribute('width', $width * $scale);
        $svg->setAttribute('height', $height * $scale);
        $svg->setAttribute('viewBox', "0 0 {$width} {$height}");
        $svg->setAttribute('xmlns', self::SVG_NAMESPACE);
        $svg->setAttribute('preserveAspectRatio', 'xMidYMid meet');
        
        $dom->appendChild($svg);
        return $svg;
    }

    /**
     * Add technical drawing elements
     */
    private function addTechnicalElements(\DOMElement $svg, ConfigurationData $configData): void
    {
        $dom = $svg->ownerDocument;
        
        // Add main frame
        $this->addTechnicalFrame($dom, $svg, $configData);
        
        // Add divisions
        foreach ($configData->divisions as $division) {
            $this->addTechnicalDivision($dom, $svg, $division);
        }
        
        // Add dimensions and annotations
        $this->addTechnicalAnnotations($dom, $svg, $configData);
    }

    /**
     * Add visual elements
     */
    private function addVisualElements(\DOMElement $svg, ConfigurationData $configData, string $material): void
    {
        $dom = $svg->ownerDocument;
        
        // Add material-specific styling
        $this->addMaterialStyling($dom, $svg, $material);
        
        // Add main frame
        $this->addVisualFrame($dom, $svg, $configData, $material);
        
        // Add divisions
        foreach ($configData->divisions as $division) {
            $this->addVisualDivision($dom, $svg, $division, $material);
        }
    }

    /**
     * Add technical frame
     */
    private function addTechnicalFrame(\DOMDocument $dom, \DOMElement $svg, ConfigurationData $configData): void
    {
        $rect = $dom->createElement('rect');
        $rect->setAttribute('x', '0');
        $rect->setAttribute('y', '0');
        $rect->setAttribute('width', $configData->dimensions->width);
        $rect->setAttribute('height', $configData->dimensions->height);
        $rect->setAttribute('stroke', self::DEFAULT_STROKE);
        $rect->setAttribute('stroke-width', self::DEFAULT_STROKE_WIDTH);
        $rect->setAttribute('fill', self::DEFAULT_FILL);
        
        $svg->appendChild($rect);
    }

    /**
     * Add visual frame
     */
    private function addVisualFrame(\DOMDocument $dom, \DOMElement $svg, ConfigurationData $configData, string $material): void
    {
        $rect = $dom->createElement('rect');
        $rect->setAttribute('x', '0');
        $rect->setAttribute('y', '0');
        $rect->setAttribute('width', $configData->dimensions->width);
        $rect->setAttribute('height', $configData->dimensions->height);
        $rect->setAttribute('stroke', $this->getMaterialStrokeColor($material));
        $rect->setAttribute('stroke-width', self::DEFAULT_STROKE_WIDTH);
        $rect->setAttribute('fill', $this->getMaterialFillColor($material));
        
        $svg->appendChild($rect);
    }

    /**
     * Add technical division
     */
    private function addTechnicalDivision(\DOMDocument $dom, \DOMElement $svg, DivisionData $division): void
    {
        // Get the original dimensions from viewBox
        $viewBox = $svg->getAttribute('viewBox');
        preg_match('/0 0 (\d+) (\d+)/', $viewBox, $matches);
        $originalWidth = (int) $matches[1];
        $originalHeight = (int) $matches[2];
        
        // Calculate position (center of the frame)
        $x = ($originalWidth - $division->width) / 2;
        $y = ($originalHeight - $division->height) / 2;
        
        $rect = $dom->createElement('rect');
        $rect->setAttribute('x', $x);
        $rect->setAttribute('y', $y);
        $rect->setAttribute('width', $division->width);
        $rect->setAttribute('height', $division->height);
        $rect->setAttribute('stroke', '#666666');
        $rect->setAttribute('stroke-width', '1');
        $rect->setAttribute('fill', self::DEFAULT_FILL);
        
        $svg->appendChild($rect);
        
        // Add thickness indicator if available
        if ($division->thickness) {
            $this->addThicknessIndicator($dom, $svg, $division, $x, $y);
        }
        
        // Add sub-divisions recursively
        foreach ($division->divisions as $subDivision) {
            $this->addTechnicalDivision($dom, $svg, $subDivision);
        }
    }

    /**
     * Add visual division
     */
    private function addVisualDivision(\DOMDocument $dom, \DOMElement $svg, DivisionData $division, string $material): void
    {
        // Get the original dimensions from viewBox
        $viewBox = $svg->getAttribute('viewBox');
        preg_match('/0 0 (\d+) (\d+)/', $viewBox, $matches);
        $originalWidth = (int) $matches[1];
        $originalHeight = (int) $matches[2];
        
        // Calculate position (center of the frame)
        $x = ($originalWidth - $division->width) / 2;
        $y = ($originalHeight - $division->height) / 2;
        
        $rect = $dom->createElement('rect');
        $rect->setAttribute('x', $x);
        $rect->setAttribute('y', $y);
        $rect->setAttribute('width', $division->width);
        $rect->setAttribute('height', $division->height);
        $rect->setAttribute('stroke', $this->getMaterialStrokeColor($material));
        $rect->setAttribute('stroke-width', '1');
        $rect->setAttribute('fill', $this->getMaterialFillColor($material, 0.8));
        
        $svg->appendChild($rect);
        
        // Add sub-divisions recursively
        foreach ($division->divisions as $subDivision) {
            $this->addVisualDivision($dom, $svg, $subDivision, $material);
        }
    }

    /**
     * Add thickness indicator
     */
    private function addThicknessIndicator(\DOMDocument $dom, \DOMElement $svg, DivisionData $division, float $x, float $y): void
    {
        $line = $dom->createElement('line');
        $line->setAttribute('x1', $x + $division->width);
        $line->setAttribute('y1', $y);
        $line->setAttribute('x2', $x + $division->width + 20);
        $line->setAttribute('y2', $y);
        $line->setAttribute('stroke', '#333333');
        $line->setAttribute('stroke-width', '1');
        
        $svg->appendChild($line);
        
        // Add thickness text
        $text = $dom->createElement('text');
        $text->setAttribute('x', $x + $division->width + 25);
        $text->setAttribute('y', $y + 5);
        $text->setAttribute('font-size', '12');
        $text->setAttribute('fill', '#333333');
        $text->textContent = $division->thickness . 'mm';
        
        $svg->appendChild($text);
    }

    /**
     * Add technical annotations
     */
    private function addTechnicalAnnotations(\DOMDocument $dom, \DOMElement $svg, ConfigurationData $configData): void
    {
        // Add dimension lines
        $this->addDimensionLine($dom, $svg, 0, 0, $configData->dimensions->width, 0, 'width');
        $this->addDimensionLine($dom, $svg, 0, 0, 0, $configData->dimensions->height, 'height');
    }

    /**
     * Add dimension line
     */
    private function addDimensionLine(\DOMDocument $dom, \DOMElement $svg, float $x1, float $y1, float $x2, float $y2, string $label): void
    {
        $line = $dom->createElement('line');
        $line->setAttribute('x1', $x1);
        $line->setAttribute('y1', $y1);
        $line->setAttribute('x2', $x2);
        $line->setAttribute('y2', $y2);
        $line->setAttribute('stroke', '#999999');
        $line->setAttribute('stroke-width', '1');
        $line->setAttribute('stroke-dasharray', '3,3');
        
        $svg->appendChild($line);
        
        // Add dimension text
        $text = $dom->createElement('text');
        $text->setAttribute('x', ($x1 + $x2) / 2);
        $text->setAttribute('y', ($y1 + $y2) / 2 - 10);
        $text->setAttribute('font-size', '10');
        $text->setAttribute('fill', '#666666');
        $text->setAttribute('text-anchor', 'middle');
        $text->textContent = $label === 'width' ? $x2 . 'mm' : $y2 . 'mm';
        
        $svg->appendChild($text);
    }

    /**
     * Add material styling
     */
    private function addMaterialStyling(\DOMDocument $dom, \DOMElement $svg, string $material): void
    {
        $defs = $dom->createElement('defs');
        $svg->appendChild($defs);
        
        // Add material-specific patterns or gradients
        switch ($material) {
            case 'wood':
                $this->addWoodPattern($dom, $defs);
                break;
            case 'vinyl':
                $this->addVinylPattern($dom, $defs);
                break;
            case 'aluminum':
                $this->addAluminumPattern($dom, $defs);
                break;
        }
    }

    /**
     * Add wood pattern
     */
    private function addWoodPattern(\DOMDocument $dom, \DOMElement $defs): void
    {
        $pattern = $dom->createElement('pattern');
        $pattern->setAttribute('id', 'wood-pattern');
        $pattern->setAttribute('patternUnits', 'userSpaceOnUse');
        $pattern->setAttribute('width', '20');
        $pattern->setAttribute('height', '20');
        
        $rect = $dom->createElement('rect');
        $rect->setAttribute('width', '20');
        $rect->setAttribute('height', '20');
        $rect->setAttribute('fill', '#8B4513');
        
        $pattern->appendChild($rect);
        $defs->appendChild($pattern);
    }

    /**
     * Add vinyl pattern
     */
    private function addVinylPattern(\DOMDocument $dom, \DOMElement $defs): void
    {
        $pattern = $dom->createElement('pattern');
        $pattern->setAttribute('id', 'vinyl-pattern');
        $pattern->setAttribute('patternUnits', 'userSpaceOnUse');
        $pattern->setAttribute('width', '10');
        $pattern->setAttribute('height', '10');
        
        $rect = $dom->createElement('rect');
        $rect->setAttribute('width', '10');
        $rect->setAttribute('height', '10');
        $rect->setAttribute('fill', '#F5F5F5');
        
        $pattern->appendChild($rect);
        $defs->appendChild($pattern);
    }

    /**
     * Add aluminum pattern
     */
    private function addAluminumPattern(\DOMDocument $dom, \DOMElement $defs): void
    {
        $pattern = $dom->createElement('pattern');
        $pattern->setAttribute('id', 'aluminum-pattern');
        $pattern->setAttribute('patternUnits', 'userSpaceOnUse');
        $pattern->setAttribute('width', '15');
        $pattern->setAttribute('height', '15');
        
        $rect = $dom->createElement('rect');
        $rect->setAttribute('width', '15');
        $rect->setAttribute('height', '15');
        $rect->setAttribute('fill', '#C0C0C0');
        
        $pattern->appendChild($rect);
        $defs->appendChild($pattern);
    }

    /**
     * Get material stroke color
     */
    private function getMaterialStrokeColor(string $material): string
    {
        return match ($material) {
            'wood' => '#8B4513',
            'vinyl' => '#2F4F4F',
            'aluminum' => '#696969',
            default => self::DEFAULT_STROKE,
        };
    }

    /**
     * Get material fill color
     */
    private function getMaterialFillColor(string $material, float $opacity = 1.0): string
    {
        $color = match ($material) {
            'wood' => '#DEB887',
            'vinyl' => '#F0F8FF',
            'aluminum' => '#D3D3D3',
            default => '#FFFFFF',
        };
        
        if ($opacity < 1.0) {
            return $color . sprintf('%02X', (int)($opacity * 255));
        }
        
        return $color;
    }

    /**
     * Format SVG for output
     */
    private function formatSvg(\DOMElement $svg): string
    {
        $dom = $svg->ownerDocument;
        $dom->formatOutput = true;
        
        return $dom->saveXML($svg);
    }
} 