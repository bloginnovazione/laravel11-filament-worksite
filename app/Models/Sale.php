<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }

    public function getCodeAttribute()
    {
        return $this->house()->first()->code;
    }

    public function getTypeAttribute()
    {
        return $this->house()->first()->type;
    }

    public function getPriceAttribute()
    {
        return $this->house()->first()->price;
    }
    public function getFloorAttribute()
    {
        return $this->house()->first()->floor;
    }
    public function getRoomNumberAttribute()
    {
        return $this->house()->first()->room_number;
    }
}
