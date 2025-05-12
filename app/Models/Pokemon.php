<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pokemon extends Model
{
    public function abilities(): BelongsToMany
    {
        return $this->belongsToMany(Ability::class, 'pokemon_abilities');
    }

    public function moves(): BelongsToMany
    {
        return $this->belongsToMany(Move::class);
    }

    public function preEvolution(): BelongsTo
    {
        return $this->belongsTo(Pokemon::class, 'pre_evolution_id');
    }

    public function evolutions(): HasMany
    {
        return $this->hasMany(Pokemon::class, 'pre_evolution_id');
    }
}
