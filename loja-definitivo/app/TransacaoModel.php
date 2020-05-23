<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransacaoModel extends Model
{
    protected $table = 'transacao';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'data', 'valor_total'
    ];
}
