<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Question extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'questions_array',
        'answer',
        'last_seen_at',
        'answered_at',
        'ip_address',
        'theme_id',
    ];

    protected $casts = [
        'questions_array' => 'array',
        'last_seen_at' => 'datetime',
        'answered_at' => 'datetime',
    ];
}
