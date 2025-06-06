<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ad::all()->each(function ($ad) {
            $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $ad->categories()->syncWithoutDetaching($categories);
        });
    }
}
