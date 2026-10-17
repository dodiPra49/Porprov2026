<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contingent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'leader_name',
        'contact_phone',
        'logo_url',
        'color_hex',
        'official_count',
        'athlete_count',
        'target_gold',
        'description',
    ];

    public function athletes(): HasMany
    {
        return $this->hasMany(Athlete::class);
    }

    public function medalTally(): HasOne
    {
        return $this->hasOne(MedalTally::class);
    }

    public function records(): HasMany
    {
        return $this->hasMany(PorprovRecord::class);
    }

    public function cheers(): HasMany
    {
        return $this->hasMany(SupporterCheer::class);
    }
}
