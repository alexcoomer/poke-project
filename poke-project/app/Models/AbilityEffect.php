<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AbilityEffect extends Model
{
    public function ability(): BelongsTo
    {
        return $this->belongsTo(Ability::class);
    }

    public function statEffects(): BelongsToMany
    {
        return $this->belongsToMany(StatEffect::class);
    }

    public function statusCondition(): BelongsTo
    {
        return $this->belongsTo(StatusCondition::class);
    }

    public function weatherCondition(): BelongsTo
    {
        return $this->belongsTo(WeatherCondition::class);
    }

    public function itemCondition(): BelongsTo
    {
        return $this->belongsTo(ItemCondition::class);
    }

    public function terrainCondition(): BelongsTo
    {
        return $this->belongsTo(TerrainCondition::class);
    }
}
