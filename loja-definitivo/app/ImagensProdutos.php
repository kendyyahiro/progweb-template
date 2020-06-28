<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagensProdutos extends Model
{
    protected $table = 'imagens_produtos';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'produto_id', 'imagem'
    ];

    public function produto(){
        return $this->hasMany(Produto::class);
    }
}
