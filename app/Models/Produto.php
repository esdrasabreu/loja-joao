<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'codigo',
        'categoria',
        'nome',
        'preco',
        'composicao',
        'tamanho',
        'quantidade'
    ];

    public function images(){
        return $this->hasMany(ImagemProduto::class, 'produto_id');
    }
}
