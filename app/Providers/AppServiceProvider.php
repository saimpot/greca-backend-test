<?php

namespace App\Providers;

use App\Services\BookingService;
use App\Contracts\Booking\BookingRepositoryInterface;
use App\Contracts\Booking\BookingServiceInterface;
use App\Repositories\Booking\BookingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(BookingServiceInterface::class, BookingService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
