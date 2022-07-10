<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $fillable = [
        'nome','slug'
    ];


    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
