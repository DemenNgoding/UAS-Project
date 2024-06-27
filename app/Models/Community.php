<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Community extends Model
{
    use HasFactory;

    protected $table = 'community';

    protected $fillable = [
        'community_name', 
        'category', 
        'members', 
        'creator_id', 
        'description', 
        'city',
    ];

}