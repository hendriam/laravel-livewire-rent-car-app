<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    protected $fillable = [
        'user_id',
        'role',
    ];

    // Relasi ke user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
