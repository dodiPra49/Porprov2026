<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubSport extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport_id',
        'name',
        'code',
        'gender_category',
        'match_type',
    ];

    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function records(): HasMany
    {
        return $this->hasMany(PorprovRecord::class);
    }
}
