<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'video_url',
        'caption',
        'author_id',
        'created_at',
        'updated_at'
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp'
        ];
    }
}
