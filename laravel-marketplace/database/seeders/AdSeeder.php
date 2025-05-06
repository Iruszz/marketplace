<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Ad;
use App\Models\User;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = Category::pluck('id');
        
        Ad::factory()
        ->count(20)
        ->make()
        ->each(function ($ad) use ($categoryIds) {
            $ad->category_id = $categoryIds->random();
            $ad->user_id = User::inRandomOrder()->first()->id;

            $ad->save();
        });
    }
}
