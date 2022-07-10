<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;



class Artigo extends Model
{

    protected $fillable = [
        'nome','texto' ,'ref' ,'slug'
    ];

    public function arquivos()
    {
        return $this->hasMany(Arquivo::class, 'ref', 'ref'); //'foreign_key', 'local_key'
    }

}
