<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MInecraft extends Model
{
    protected $table = 'minecraft';

    public $timestamps = [];
    const UPDATED_AT = null;
    const CREATED_AT = null;

    use HasFactory;

    protected $fillable = [
        'id',
        'estado',
    ];
}
