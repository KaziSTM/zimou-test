<?php

namespace App\Traits;

use App\Models\Package;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasPackages
{
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }
}
