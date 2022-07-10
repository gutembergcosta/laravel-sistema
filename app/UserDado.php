<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;



class UserDado extends Model
{

    public $timestamps = false;


    protected $fillable = [
        'user_id',
        'tipo',
        'status_id',
        'nome',
        'exibir_id',
        'texto',
        'rg',
        'cpf',
        'tel01',
        'tel02',
        'cep',
        'endereco',
        'telefone',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'nascimento',
        'zap',
        'list',
        'cnpj',
        'razao_social',
        'nome_fantasia',
        'categoria_user',
        'pago',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

}
