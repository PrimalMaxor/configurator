<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'main_category_id',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the products for this category.
     */
    public function products()
    {
        // TODO: Uncomment when Product model is created
        // return $this->hasMany(\App\Models\Product::class);
    }

    /**
     * Get the main category that this category belongs to.
     */
    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'main_category_id');
    }

    /**
     * Get the sub-categories of this category.
     */
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'main_category_id');
    }

    /**
     * Scope a query to only include active categories.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include main categories (categories without a parent).
     */
    public function scopeMainCategories($query)
    {
        return $query->whereNull('main_category_id');
    }

    /**
     * Scope a query to only include sub-categories (categories with a parent).
     */
    public function scopeSubCategories($query)
    {
        return $query->whereNotNull('main_category_id');
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Generate slug from name
     */
    public static function generateSlug($name)
    {
        $slug = Str::slug($name);
        $count = static::where('slug', 'LIKE', $slug . '%')->count();
        
        return $count ? "{$slug}-{$count}" : $slug;
    }
}
