<?php

namespace App\Console\Commands;

use App\Category;
use App\Tag;
use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:refresh'; // ini akan menjadi keywordnya:actionnya

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh all database and seed the default data'; // deskripsi

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // k: panggil command nya
        $this->call('migrate:refresh');

        // k: panggil seed di command nya
        $this->call('db:seed');

        // $categories = collect(['Framework', 'Code', 'Android', 'Web']);
        // $categories->each(function ($c) {
        //     Category::create([
        //         'name' => $c,
        //         'slug' => strtolower($c)
        //     ]);
        // });

        // $tags = collect(['Laravel', 'ReactJS', 'PHP', 'Javascript', 'HTML']);
        // $tags->each(function ($t) {
        //     Tag::create([
        //         'name' => $t,
        //         'slug' => strtolower($t)
        //     ]);
        // });


        $this->info('this command has been refeshed and seeded!');













        // k: line untuk memunculkan pesan
        // $this->line('this command has been run!');
    }
}
