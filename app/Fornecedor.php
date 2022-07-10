<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores'; // Nome da tabela em pt-br
    protected $fillable = ['nome']; // Nome dos campos
}
