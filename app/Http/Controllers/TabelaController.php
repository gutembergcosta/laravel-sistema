<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tabela;
use App\Http\Requests\TabelaRequest;
use App\Actions\Tabela\SalvarTabela;
use App\Actions\Tabela\DataFormTabela;
use App\Actions\Arquivo\ExcluirArquivo;

class TabelaController extends Controller
{

    public function __construct(DataFormTabela $dataFormTabela)
    {
        $this->dataFormTabela = $dataFormTabela;   
    }
  
    public function lista()
    {
        $tipoUser = (Auth::user()->userDados->tipo == 'admin') ? 'admin' : 'user';
        $lista = Tabela::all();
        return view('painel.tabelas.lista-'.$tipoUser, compact('lista'));
    }
    
    public function formulario($action, $id = null)
    {
        $data = $this->dataFormTabela->getData($action, $id);
        return view('painel.tabelas.formulario', $data);
    }

    
    public function salvar(TabelaRequest $request, SalvarTabela $salvarTabela)
    {
        $data = $salvarTabela->execute($request);
        return response()->json($data);
        
    }
    
    public function destroy(Request $request, ExcluirArquivo $excluirArquivo)
    {
        $item       = Tabela::find($request->id);
        $excluirArquivo->destroyGaleria($item->ref);
        //$item->delete();
        return response()->json(['msg' =>'Item excluido com sucesso']);

    }
}
