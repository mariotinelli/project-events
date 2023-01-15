<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'user_id',
        'event_category_id',
        'address_id',
        'title',
        'description',
        'image',
        'participants',
        'date',
        'duration'
    ];

}
