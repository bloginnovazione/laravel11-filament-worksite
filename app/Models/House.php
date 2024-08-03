<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use HasFactory;

    public function worksite(): BelongsTo
    {
        return $this->belongsTo(Worksite::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

}
