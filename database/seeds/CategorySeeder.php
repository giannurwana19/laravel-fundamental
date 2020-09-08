<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Framework', 'Code', 'Android', 'Web']);
        $categories->each(function ($c){
            Category::create([
                'name' => $c,
                'slug' => strtolower($c)
            ]);
        });
    }
}