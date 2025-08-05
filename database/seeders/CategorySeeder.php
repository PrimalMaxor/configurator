<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main categories
        $windowFrames = Category::create([
            'name' => 'Window Frames',
            'slug' => 'window-frames',
            'description' => 'High-quality window frames for all types of windows',
            'sort_order' => 1,
        ]);

        $doors = Category::create([
            'name' => 'Doors',
            'slug' => 'doors',
            'description' => 'Premium door frames and doors for residential and commercial use',
            'sort_order' => 2,
        ]);

        $slidingDoors = Category::create([
            'name' => 'Sliding Doors',
            'slug' => 'sliding-doors',
            'description' => 'Modern sliding door solutions for space-efficient design',
            'sort_order' => 3,
        ]);

        // Create sub-categories for Window Frames
        Category::create([
            'name' => 'Glass Window',
            'slug' => 'glass-window',
            'main_category_id' => $windowFrames->id,
            'description' => 'Traditional glass windows with various frame materials',
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Turn Tilt Window',
            'slug' => 'turn-tilt-window',
            'main_category_id' => $windowFrames->id,
            'description' => 'Modern turn-tilt windows for easy cleaning and ventilation',
            'sort_order' => 2,
        ]);

        // Create sub-categories for Doors
        Category::create([
            'name' => 'Front Door',
            'slug' => 'front-door',
            'main_category_id' => $doors->id,
            'description' => 'Main entrance doors with security and style',
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Garden Door',
            'slug' => 'garden-door',
            'main_category_id' => $doors->id,
            'description' => 'Doors connecting indoor and outdoor spaces',
            'sort_order' => 2,
        ]);

        Category::create([
            'name' => 'Garage Door',
            'slug' => 'garage-door',
            'main_category_id' => $doors->id,
            'description' => 'Durable garage doors for vehicle and storage access',
            'sort_order' => 3,
        ]);

        // Create sub-categories for Sliding Doors
        Category::create([
            'name' => 'Hefschuifpui',
            'slug' => 'hefschuifpui',
            'main_category_id' => $slidingDoors->id,
            'description' => 'Lift-slide doors for seamless indoor-outdoor living',
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Vouwdeur',
            'slug' => 'vouwdeur',
            'main_category_id' => $slidingDoors->id,
            'description' => 'Folding doors that create wide openings',
            'sort_order' => 2,
        ]);
    }
}
