<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */

    //  jika buat policy, daftarkan disini
    protected $policies = [
        'App\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    // method ini akan membaca aturan yang ada di
    // $protected $policies
    public function boot()
    {
        $this->registerPolicies();

        // $user adalah nama modelnya
        // pebandingan nya harus null
        Gate::before(function ($user) {
            return $user->isAdmin() ? true : null;
        });
    }
}
