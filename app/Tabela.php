<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabela extends Model
{

    protected $fillable = [
        'nome' ,'ref' ,'slug'
    ];

    public function arquivos()
    {
        return $this->hasMany(Arquivo::class, 'ref', 'ref'); //'foreign_key', 'local_key'
    }

}
