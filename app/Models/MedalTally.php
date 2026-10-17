<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedalTally extends Model
{
    use HasFactory;

    protected $fillable = [
        'contingent_id',
        'gold',
        'silver',
        'bronze',
        'total_medals',
        'rank_position',
        'last_updated_at',
    ];

    protected $casts = [
        'last_updated_at' => 'datetime',
    ];

    public function contingent(): BelongsTo
    {
        return $this->belongsTo(Contingent::class);
    }
}
