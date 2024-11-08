<?php

namespace App\Traits;

trait HasAvatar
{
    /**
     * Get the default profile photo URL.
     *
     * If the user has not uploaded a profile photo, this method generates
     * a default profile photo URL using the UI Avatars service. The avatar
     * is generated based on the user's full name or, if unavailable, the
     * application's name.
     *
     * @return string The default profile photo URL.
     */
    public function getAvatarAttribute(): string
    {
        if ($this->name) {
            return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=1f2937&background=f3f4f6';
        }

        return 'https://ui-avatars.com/api/?name='.urlencode(config('app.name')).'&color=1f2937&background=f3f4f6';
    }
}
