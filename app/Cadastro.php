<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'telefone','endereco','numero','complemento','bairro','cidade','uf','aprovado'
    ];

}
