<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    protected $table = 'favoritos';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'produto_id', 'user_id', 'situacao'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
