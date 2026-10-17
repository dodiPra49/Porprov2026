<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_sport_id',
        'venue_id',
        'match_code',
        'round_name',
        'scheduled_at',
        'finished_at',
        'status',
        'notes',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    public function subSport(): BelongsTo
    {
        return $this->belongsTo(SubSport::class);
    }

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    public function matchResult(): HasOne
    {
        return $this->hasOne(MatchResult::class);
    }
}
