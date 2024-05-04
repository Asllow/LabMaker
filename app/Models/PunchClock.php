<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PunchClock extends Model
{   
    protected $table = 'punch_clock';

    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = ['created_at'];
    const UPDATED_AT = null;

    protected $fillable = [
        'registration',
        'io',
        'created_at',
    ];
}
