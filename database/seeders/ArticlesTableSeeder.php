<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::truncate();

        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'title' => fake()->sentence,
                'body' => fake()->paragraph,
            ]);
        }
    }
}
