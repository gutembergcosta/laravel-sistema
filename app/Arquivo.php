<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;



class Arquivo extends Model
{

    public $timestamps = false;


    protected $fillable = [
        'tipo',
        'ref',
        'arquivo',
        'nome',
        'status',
        'ordem',
    ];


    public function artigo()
    {
        return $this->belongsTo(Artigo::class, 'ref', 'ref');
    }

    public function tabela()
    {
        return $this->belongsTo(Artigo::class, 'ref', 'ref');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'ref', 'ref');
    }

    public function Proposta()
    {
        return $this->belongsTo(Proposta::class, 'ref', 'ref');
    }

    

}
