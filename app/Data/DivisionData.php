<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class DivisionData extends Data
{
    public function __construct(
        /** @var \App\Data\DivisionData[] */
        public array $divisions = [],

        /** @var \App\Data\OptionData[] */
        public array $options = [],

        public int $width,
        public ?int $thickness = null,
        public int $height,
    ) {
    }
    
} 