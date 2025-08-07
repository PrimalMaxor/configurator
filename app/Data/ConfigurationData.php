<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ConfigurationData extends Data
{
    public function __construct(
        public string $material,
        public DimensionData $dimensions,
        
        /** @var \App\Data\DivisionData[] */
        public array $divisions = [],
    ) {
    }
    
} 