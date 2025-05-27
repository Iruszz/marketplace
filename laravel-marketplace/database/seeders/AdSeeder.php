<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $imageFiles = Storage::disk('public')->files('ads-images');

        Ad::factory()->count(20)->create()->each(function ($ad) use ($imageFiles) {
        $ad->image = basename(Arr::random($imageFiles));
        $ad->save();
        });
    }
}
