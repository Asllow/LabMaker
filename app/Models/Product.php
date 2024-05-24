<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produto';

    protected $fillable = [
        'nome_produto',
        'desc_produto',
        'dimensao_produto',
        'img_produto',
        'preco_produto'
    ];

}
