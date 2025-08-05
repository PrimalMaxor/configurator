<?php

namespace App\Services;

class SvgGeneratorService
{
    public function generateFrameSvg(array $config): string
    {
        $dimensions = $config['dimensions'];
        $dividers = $config['dividers'];
        
        $outerWidth = $dimensions['width'];
        $outerHeight = $dimensions['height'];
        $thickness = $dimensions['thickness'];
        
        // Add padding and scale down to fit in view
        $padding = 50;
        $scale = 0.3; // Make SVG smaller to fit in view
        $svgWidth = ($outerWidth * $scale) + ($padding * 2) + 50;
        $svgHeight = ($outerHeight * $scale) + ($padding * 2);
        
        $svg = "<svg width=\"{$svgWidth}\" height=\"{$svgHeight}\" viewBox=\"0 0 {$svgWidth} {$svgHeight}\" xmlns=\"http://www.w3.org/2000/svg\">";
        
        // Background
        $svg .= "<rect width=\"{$svgWidth}\" height=\"{$svgHeight}\" fill=\"#f8f9fa\"/>";
        
        // Draw outer frame
        $svg .= $this->drawOuterFrame($outerWidth, $outerHeight, $thickness, $padding, $scale);
        
        // Draw inner dividers if they exist
        if (isset($dividers['thickness'])) {
            $svg .= $this->drawInnerFrame($dividers, $thickness, $padding, $scale);
        }
        
        // Draw measurement indicators
        $svg .= $this->drawMeasurementIndicators($outerWidth, $outerHeight, $padding, $scale);
        
        $svg .= "</svg>";
        
        return $svg;
    }
    
    private function drawOuterFrame(int $width, int $height, int $thickness, int $padding, float $scale): string
    {
        $svg = '';
        
        // Scale and position the frame
        $scaledWidth = $width * $scale;
        $scaledHeight = $height * $scale;
        $scaledThickness = $thickness * $scale;
        
        // Outer rectangle (frame outline)
        $svg .= "<rect x=\"{$padding}\" y=\"{$padding}\" width=\"{$scaledWidth}\" height=\"{$scaledHeight}\" fill=\"none\" stroke=\"#333\" stroke-width=\"2\"/>";
        
        // Inner rectangle (inner frame line)
        $innerX = $padding + $scaledThickness;
        $innerY = $padding + $scaledThickness;
        $innerWidth = $scaledWidth - ($scaledThickness * 2);
        $innerHeight = $scaledHeight - ($scaledThickness * 2);
        
        $svg .= "<rect x=\"{$innerX}\" y=\"{$innerY}\" width=\"{$innerWidth}\" height=\"{$innerHeight}\" fill=\"none\" stroke=\"#333\" stroke-width=\"2\"/>";
        
        return $svg;
    }
    
    private function drawInnerFrame(array $dividers, int $outerThickness, int $padding, float $scale): string
    {
        $svg = '';
        $dividerThickness = $dividers['thickness'] * $scale;
        $dividerWidth = $dividers['width'] * $scale;
        $dividerHeight = $dividers['height'] * $scale;
        
        // Calculate position for inner frame (positioned relative to outer frame's inner line)
        $outerInnerX = $padding + ($outerThickness * $scale);
        $outerInnerY = $padding + ($outerThickness * $scale);
        
        // Position inner frame relative to outer frame's inner line
        $startX = $outerInnerX;
        $startY = $outerInnerY;
        
        // Draw inner frame outer rectangle
        $innerOuterWidth = $dividerWidth + ($dividerThickness * 2);
        $innerOuterHeight = $dividerHeight + ($dividerThickness * 2);
        $svg .= "<rect x=\"{$startX}\" y=\"{$startY}\" width=\"{$innerOuterWidth}\" height=\"{$innerOuterHeight}\" fill=\"none\" stroke=\"#666\" stroke-width=\"2\"/>";
        
        // Draw inner frame inner rectangle
        $innerInnerX = $startX + $dividerThickness;
        $innerInnerY = $startY + $dividerThickness;
        
        $svg .= "<rect x=\"{$innerInnerX}\" y=\"{$innerInnerY}\" width=\"{$dividerWidth}\" height=\"{$dividerHeight}\" fill=\"none\" stroke=\"#666\" stroke-width=\"2\"/>";
        
        return $svg;
    }
    
    private function drawMeasurementIndicators(int $width, int $height, int $padding, float $scale): string
    {
        $svg = '';
        $scaledWidth = $width * $scale;
        $scaledHeight = $height * $scale;
        
        // Height indicator (right side)
        $heightIndicatorX = $padding + $scaledWidth + 15;
        $heightIndicatorY = $padding;
        
        // Height arrow with proper arrowheads
        $svg .= "<line x1=\"{$heightIndicatorX}\" y1=\"{$heightIndicatorY}\" x2=\"{$heightIndicatorX}\" y2=\"" . ($heightIndicatorY + $scaledHeight) . "\" stroke=\"#333\" stroke-width=\"2\"/>";
        
        // Top arrowhead
        $svg .= "<polygon points=\"" . ($heightIndicatorX - 4) . "," . ($heightIndicatorY + 4) . " " . ($heightIndicatorX + 4) . "," . ($heightIndicatorY + 4) . " " . $heightIndicatorX . "," . ($heightIndicatorY - 2) . "\" fill=\"#333\"/>";
        
        // Bottom arrowhead
        $svg .= "<polygon points=\"" . ($heightIndicatorX - 4) . "," . ($heightIndicatorY + $scaledHeight - 4) . " " . ($heightIndicatorX + 4) . "," . ($heightIndicatorY + $scaledHeight - 4) . " " . $heightIndicatorX . "," . ($heightIndicatorY + $scaledHeight + 2) . "\" fill=\"#333\"/>";
        
        // Height text
        $svg .= "<text x=\"" . ($heightIndicatorX + 20) . "\" y=\"" . ($heightIndicatorY + ($scaledHeight / 2)) . "\" font-family=\"Arial\" font-size=\"12\" fill=\"#333\" text-anchor=\"start\" dominant-baseline=\"middle\">{$height}mm</text>";
        
        // Width indicator (bottom)
        $widthIndicatorX = $padding;
        $widthIndicatorY = $padding + $scaledHeight + 15;
        
        // Width arrow with proper arrowheads
        $svg .= "<line x1=\"{$widthIndicatorX}\" y1=\"{$widthIndicatorY}\" x2=\"" . ($widthIndicatorX + $scaledWidth) . "\" y2=\"{$widthIndicatorY}\" stroke=\"#333\" stroke-width=\"2\"/>";
        
        // Left arrowhead
        $svg .= "<polygon points=\"" . ($widthIndicatorX + 4) . "," . ($widthIndicatorY - 4) . " " . ($widthIndicatorX + 4) . "," . ($widthIndicatorY + 4) . " " . ($widthIndicatorX - 2) . "," . $widthIndicatorY . "\" fill=\"#333\"/>";
        
        // Right arrowhead
        $svg .= "<polygon points=\"" . ($widthIndicatorX + $scaledWidth - 4) . "," . ($widthIndicatorY - 4) . " " . ($widthIndicatorX + $scaledWidth - 4) . "," . ($widthIndicatorY + 4) . " " . ($widthIndicatorX + $scaledWidth + 2) . "," . $widthIndicatorY . "\" fill=\"#333\"/>";
        
        // Width text
        $svg .= "<text x=\"" . ($widthIndicatorX + ($scaledWidth / 2)) . "\" y=\"" . ($widthIndicatorY + 20) . "\" font-family=\"Arial\" font-size=\"12\" fill=\"#333\" text-anchor=\"middle\">{$width}mm</text>";
        
        return $svg;
    }
} 