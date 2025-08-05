<?php

namespace App\Http\Controllers;

use App\Materials;
use App\Models\StaticPage;
use App\Models\Category;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $homepage = StaticPage::homepage();
        
        // Get main categories with their sub-categories
        $categories = Category::mainCategories()
            ->with('subCategories')
            ->ordered()
            ->active()
            ->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'sub_categories' => $category->subCategories->map(function ($subCategory) {
                        return [
                            'id' => $subCategory->id,
                            'name' => $subCategory->name,
                            'slug' => $subCategory->slug,
                        ];
                    }),
                ];
            });
        
        return Inertia::render('Home', [
            'homepage' => $homepage ? [
                'title' => $homepage->title,
                'description' => $homepage->description,
                'content' => $homepage->content,
                'main_image' => $homepage->main_image,
            ] : null,
            'categories' => $categories,
        ]);
    }
}
