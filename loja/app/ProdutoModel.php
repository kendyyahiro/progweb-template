<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoModel extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'id';
    protected $fillable = ['nome','descricao'];
}
