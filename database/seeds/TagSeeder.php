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
        $tags = collect(['Laravel', 'ReactJS', 'PHP', 'Javascript', 'HTML', 'React Native', 'Swift']);
        $tags->each(function ($t) {
            Tag::create([
                'name' => $t,
                'slug' => Str::slug(strtolower($t))
            ]);
        });
    }
}
