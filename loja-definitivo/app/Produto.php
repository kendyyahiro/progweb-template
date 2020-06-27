<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Produto extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'descricao', 'categoria', 'valor', 'imagem', 'user_id'
    ];


    public function favoritos(){
        $id_usuario_logado = Auth::id();
        return $this->belongsTo(Favoritos::class, 'id', 'produto_id')->where([
            ['situacao', 1],
            ['user_id', $id_usuario_logado]
        ])->oldest();
    }

    public function imagens(){
        return $this->belongsTo(ImagensProdutos::class, 'id', 'produto_id');
    }

    public function carrinhoCompra(){
        return $this->belongsTo(CarrinhoCompra::class, 'id', 'produto_id');
    }
}
