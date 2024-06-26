<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdMaker extends Model
{
    use HasFactory;

    protected $table = 'id_maker';

    protected $fillable = [
        'registration',
        'hexa_id',
        'io',
    ];
}
