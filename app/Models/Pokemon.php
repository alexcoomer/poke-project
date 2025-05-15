<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pokemon extends Model
{
    protected $table = 'pokemon';

    public function abilities(): BelongsToMany
    {
        return $this->belongsToMany(Ability::class, 'pokemon_abilities');
    }

    public function moves(): BelongsToMany
    {
        return $this->belongsToMany(Move::class);
    }
}
