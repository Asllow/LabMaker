<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MInecraft extends Model
{
    protected $table = 'minecraft';

    use HasFactory;

    protected $fillable = [
        'id',
        'estado',
    ];
}
