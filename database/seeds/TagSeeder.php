<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Kuliah', 'Sekolah', 'Kerja', 'Bisnis', 'Karier', 'Motivasi', 'Tips & Trik', 'Kecantikan', 'Blog', 'Web Development', 'Database', 'Mobile Development', 'Desktop', 'Komputer', 'Laptop', 'Review']);
        $tags->each(function ($t) {
            Tag::create([
                'name' => $t,
                'slug' => Str::slug(strtolower($t))
            ]);
        });
    }
}
