<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Daftar kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        // 'community_id',
        'event_name',
        'content',
        'location',
        'caption',
        'date'
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Community
    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
