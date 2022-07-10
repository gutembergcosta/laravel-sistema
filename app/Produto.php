<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $fillable = ['nome','texto' ,'ref','slug' ];


    public function arquivos()
    {
        return $this->hasMany(Arquivo::class, 'ref', 'ref'); //'foreign_key', 'local_key'
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class); //'foreign_key', 'local_key'
    }
     
}
