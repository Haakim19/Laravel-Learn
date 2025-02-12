<?php

namespace App\Providers;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('update-event', function ($user, Event $event) {
            return  $user->id === $event->id;
        });
        Gate::define('delete-attendee', function ($user, Event $event, Attendee $attendee) {
            return $user->id === $event->id ||
                $user->id === $attendee->id;
        });
    }
}
