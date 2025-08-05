<?php

namespace App;

enum Materials: string
{
    case WOOD = 'wood';
    case VINYL = 'vinyl';
    case ALUMINIUM = 'aluminium';
    case STOCK = 'stock';

    public function label(): string
    {
        return match($this) {
            self::WOOD => 'Wood',
            self::VINYL => 'Vinyl',
            self::ALUMINIUM => 'Aluminium',
            self::STOCK => 'Stock',
        };
    }

    public static function all(): array
    {
        return [
            self::WOOD,
            self::VINYL,
            self::ALUMINIUM,
            self::STOCK,
        ];
    }
} 