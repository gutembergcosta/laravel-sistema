<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TabelaRequest;
use App\Actions\Tabela\SalvarTabela;
use App\Actions\Tabela\DataFormTabela;
use App\Actions\Tabela\DestroyTabela;
use App\Actions\Tabela\ListTabela;

class TabelaController extends Controller
{
    private $dataFormTabela;
    private $salvarTabela;
    private $destroyTabela;
    private $listTabela;

    public function __construct(
        DataFormTabela $dataFormTabela,
        SalvarTabela $salvarTabela,
        DestroyTabela $destroyTabela,
        ListTabela $listTabela
    )
    {
        $this->dataFormTabela = $dataFormTabela;   
        $this->salvarTabela = $salvarTabela;   
        $this->destroyTabela = $destroyTabela;   
        $this->listTabela = $listTabela;   
    }
  
    public function lista()
    {
        $data = $this->listTabela->list();
        $lista = $data['lista'];
        return view("painel.tabelas.lista-{$data['tipoUser']}", compact('lista'));
    }
    
    public function formulario($action, $id = null)
    {
        $data = $this->dataFormTabela->getData($action, $id);
        return view('painel.tabelas.formulario', $data);
    }

    
    public function salvar(TabelaRequest $request)
    {
        $data = $this->salvarTabela->execute($request);
        return response()->json($data);
    }
    
    public function destroy(Request $request)
    {
        $data = $this->destroyTabela->delete($request->id);
        return response()->json(['msg' => $data['msg']]);
    }
}
