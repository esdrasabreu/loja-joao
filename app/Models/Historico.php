<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;
    protected $table = 'historico';
    protected $fillable = [
        'id',
        'codigo',
        'categoria',
        'nome',
        'preco',
        'composicao',
        'tamanho',
        'quantidade',
        'operacao',
        'nome_usuario'

    ];
}
