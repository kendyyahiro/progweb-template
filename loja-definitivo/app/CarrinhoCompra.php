<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarrinhoCompra extends Model
{
    protected $table = 'carrinho_compra';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'produto_id', 'user_id'
    ];
}
