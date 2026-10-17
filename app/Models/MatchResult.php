<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatchResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'winner_athlete_id',
        'winner_contingent_id',
        'score_summary',
        'score_detail',
        'verified_by',
        'verified_at',
        'remarks',
    ];

    protected $casts = [
        'score_detail' => 'array',
        'verified_at' => 'datetime',
    ];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function winnerAthlete(): BelongsTo
    {
        return $this->belongsTo(Athlete::class, 'winner_athlete_id');
    }

    public function winnerContingent(): BelongsTo
    {
        return $this->belongsTo(Contingent::class, 'winner_contingent_id');
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
