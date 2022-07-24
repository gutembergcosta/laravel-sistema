<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tabela;
use App\Arquivo;
use Validator;
use App\Http\Controllers\ArquivoController;
use Illuminate\Support\Facades\Auth;





class TabelaController extends Controller
{

    public function lista(){

        $tipoUser = (Auth::user()->userDados->tipo == 'admin') ? 'admin' : 'user';
        $data = $this->data;

        $lista = Tabela::all();

        return view('painel.tabelas.lista-'.$tipoUser, compact('data','lista'));
    }

    public function formulario($action, $id = ''){

        $ref = uniqid();
        $actionForm = 'admin/salvar-tabela';
        $item = [];
        $galeria = FALSE;
        $img = '';

        if($action == 'edit'){
            
            $item   = Tabela::find($id);
            $ref    = $item->ref;

            $img = $item->arquivos->where('tipo', 'tabela')->last();

        }

        $dataArquivoDestaque = ['ref' => $ref, 'img' => $img, 'tipo' => 'tabela','titulo' => 'Tabela'];

        $compact = compact('ref', 'item','action','dataArquivoDestaque','actionForm');

     
        return view('painel.tabelas.formulario', $compact);
    }

    public function salvar(Request $request){

        $validator = Validator::make($request->all(), [
            
            'nome'      => 'required',
        ]);

        if($validator->fails()){
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()) {

            $frmData['msg']         = 'Item salvo com sucesso';
            $frmData['destino']     = 'reload';


            $request['slug'] = slug($request->nome);

            

            $x = Tabela::updateOrCreate(['id' => $request->id],$request->all())->id;

        }
 
        echo json_encode($frmData);
          
    }

    public function pagina($slug = ''){


        $destino = ($slug) ? 'site.artigo' : 'site.artigos';
    
        return view($destino);
    
    }

    public function destroy(Request $request)
    {
        $status = 1;


        $arquivo = new ArquivoController;
        
        $item       = Tabela::find($request->id);
        $ref        = $item->ref;
        $imagens    = Arquivo::where('ref', $ref)->pluck('arquivo');

        foreach($imagens as $img){
            $arquivo->excluir($img);
        }

        $item->delete();

        echo json_encode($status);

    }
}
