<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupporterCheer extends Model
{
    use HasFactory;

    protected $table = 'supporters_cheers';

    protected $fillable = [
        'contingent_id',
        'sender_name',
        'sender_city',
        'message',
        'likes_count',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function contingent(): BelongsTo
    {
        return $this->belongsTo(Contingent::class);
    }
}
