<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class DimensionData extends Data
{
    public function __construct(
        public int $width,
        public int $height,
    ) {
    }
    
} 