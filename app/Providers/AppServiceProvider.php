<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Filament\Notifications\Livewire\DatabaseNotifications;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::listen(function ($query) {
            Log::info('Query executed: ' . $query->sql, $query->bindings);
            Log::info('Time taken: ' . $query->time . 'ms');
            Log::info('Connection name: ' . $query->connectionName);
        });

        DatabaseNotifications::trigger('filament.notifications.database-notifications-trigger');
    }
}
