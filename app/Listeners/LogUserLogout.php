<?php

namespace App\Listeners;

use App\Models\UserSession;
use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogUserLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
           if (!$event->user) {
        return; // no user logged in, nothing to log
    }
        $lastSession = UserSession::where('user_id', $event->user->id)
            ->latest('login_time')->first();

        if ($lastSession && $lastSession->login_time && is_null($lastSession->logout_time)) {
            $logoutTime = now();
            $duration = $logoutTime->diffInSeconds($lastSession->login_time);

            $lastSession->update([
                'logout_time' => $logoutTime,
                'duration'    => $duration
            ]);
        }
    }
}
