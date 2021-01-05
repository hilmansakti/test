<?php

namespace App\Providers;

use App\Repository\EloquentRepositoryInterface; 
use App\Repository\UserRepositoryInterface; 
use App\Repository\UserCreditCardRepositoryInterface; 
use App\Repository\MembershipRepositoryInterface; 
use App\Repository\AddressRepositoryInterface; 
use App\Repository\Eloquent\UserRepository; 
use App\Repository\Eloquent\UserCreditCardRepository; 
use App\Repository\Eloquent\BaseRepository; 
use App\Repository\Eloquent\MembershipRepository; 
use App\Repository\Eloquent\AddressRepository; 
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserCreditCardRepositoryInterface::class, UserCreditCardRepository::class);
        $this->app->bind(MembershipRepositoryInterface::class, MembershipRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
