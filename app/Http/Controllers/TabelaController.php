<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tabela;
use Validator;
use App\Http\Requests\StoreTabelaRequest;

class TabelaController extends Controller
{
   
    public function index()
    {
        $tipoUser = (Auth::user()->userDados->tipo == 'admin') ? 'admin' : 'user';
        $lista = Tabela::all();
        return view('painel.tabelas.lista-'.$tipoUser, compact('lista'));
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

    
    public function create()
    {
        $ref = uniqid();
        $actionForm = 'admin/salvar-tabela';
        $item = [];
        $galeria = FALSE;
        $img = '';
        $action = 'add';

        $dataArquivoDestaque = ['ref' => $ref, 'img' => $img, 'tipo' => 'tabela','titulo' => 'Tabela'];

        $compact = compact('ref', 'item','action','dataArquivoDestaque','actionForm');
     
        return view('painel.tabelas.formulario', $compact);
    }

    
    public function store(StoreTabelaRequest $request)
    {
        $frmData = [];

        $frmData['msg']         = 'Item salvo com sucesso';
        $frmData['destino']     = 'reload';

        $request['slug'] = slug($request->nome);

        Tabela::Create($request->all());
 
        echo json_encode($frmData);
    }


    

    
    public function update(Request $request, $id)
    {
        dd('update');
    }

    
    public function destroy($id)
    {
        dd('destroy');
    }
}
