<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusCondition extends Model
{
    public function abilityEffects(): HasMany
    {
        return $this->hasMany(AbilityEffect::class);
    }
}
