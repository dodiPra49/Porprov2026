<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PorprovRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_sport_id',
        'athlete_id',
        'contingent_id',
        'record_metric',
        'previous_record',
        'new_record',
        'achieved_at',
        'venue_name',
        'notes',
    ];

    protected $casts = [
        'achieved_at' => 'date',
    ];

    public function subSport(): BelongsTo
    {
        return $this->belongsTo(SubSport::class);
    }

    public function athlete(): BelongsTo
    {
        return $this->belongsTo(Athlete::class);
    }

    public function contingent(): BelongsTo
    {
        return $this->belongsTo(Contingent::class);
    }
}
