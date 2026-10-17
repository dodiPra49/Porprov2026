<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Athlete extends Model
{
    use HasFactory;

    protected $fillable = [
        'contingent_id',
        'sport_id',
        'nik',
        'full_name',
        'gender',
        'birth_place',
        'birth_date',
        'photo_url',
        'height_cm',
        'weight_kg',
        'achievements',
        'is_verified',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_verified' => 'boolean',
    ];

    public function contingent(): BelongsTo
    {
        return $this->belongsTo(Contingent::class);
    }

    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }

    public function records(): HasMany
    {
        return $this->hasMany(PorprovRecord::class);
    }

    public function wonMatches(): HasMany
    {
        return $this->hasMany(MatchResult::class, 'winner_athlete_id');
    }
}
