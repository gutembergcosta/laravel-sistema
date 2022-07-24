<?php

namespace App\Actions\Tabela;
use Illuminate\Support\Facades\Auth;
use App\Tabela;
 
class ListTabela
{
    public function list()
    {
        $data['tipoUser'] = (Auth::user()->userDados->tipo == 'admin') ? 'admin' : 'user';
        $data['lista'] = Tabela::all();
    
        return $data;
    
    }
}

?>