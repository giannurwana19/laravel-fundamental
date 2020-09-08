<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Laravel', 'ReactJS', 'PHP', 'Javascript', 'HTML']);
        $tags->each(function ($t) {
            Tag::create([
                'name' => $t,
                'slug' => strtolower($t)
            ]);
        });
    }
}
