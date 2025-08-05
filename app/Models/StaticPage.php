<?php

namespace App\Models;

use App\StaticPageType;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'content',
        'main_image',
    ];

    protected $casts = [
        'type' => StaticPageType::class,
    ];

    /**
     * Get the page by type
     */
    public static function findByType(StaticPageType $type): ?self
    {
        return static::where('type', $type)->first();
    }

    /**
     * Get the homepage
     */
    public static function homepage(): ?self
    {
        return static::findByType(StaticPageType::HOMEPAGE);
    }
}
