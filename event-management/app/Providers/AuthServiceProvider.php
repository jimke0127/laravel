<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\EventPolicy;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        //Event::class => EventPolicy::class
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define("update-event", function($user, Event $event){
            //file_put_contents(public_path()."/test.log",print_r([$user->id,$event->user_id,'22'],true));
            return $user->id === $event->user_id;
        });


        Gate::define("delete-attendee", function($user, Event $event, Attendee $attendee){
            return $user->id === $event->user_id || $user->id === $attendee->user_id;
        });
    }
}
