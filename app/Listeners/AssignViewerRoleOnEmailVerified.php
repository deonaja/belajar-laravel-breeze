<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;
use Spatie\Permission\Models\Role;

class AssignViewerRoleOnEmailVerified
{
    /**
     * Handle the event.
     */
    public function handle(Verified $event): void
    {
        $user = $event->user;

        if (!$user->hasAnyRole()) {
            $user->assignRole('viewer');
        }
    }
}
