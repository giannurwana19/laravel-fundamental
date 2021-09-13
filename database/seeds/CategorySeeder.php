<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Pemerintahan', 'Pendidikan', 'Kesehatan', 'Politik', 'Sosial & Budaya', 'Teknologi', 'Makanan', 'Fashion', 'Agama', 'Filsafat', 'Musik']);
        $categories->each(function ($c) {
            Category::create([
                'name' => $c,
                'slug' => Str::slug(strtolower($c))
            ]);
        });
    }
}
