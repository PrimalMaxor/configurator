<?php

namespace App;

enum StaticPageType: string
{
    case HOMEPAGE = 'homepage';

    public function label(): string
    {
        return match($this) {
            self::HOMEPAGE => 'Homepage',
        };
    }
}
