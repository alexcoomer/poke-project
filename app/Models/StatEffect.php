<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StatEffect extends Model
{
    public function abilityEffects(): BelongsToMany
    {
        return $this->belongsToMany(AbilityEffect::class);
    }
}
