<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemProduto extends Model
{
    use HasFactory;
    protected $table = 'imagemProduto';
    public $timestamps = false;

    public function produto(){
        return $this->belongsTo(Produto::class,'produto_id');
    }
}
