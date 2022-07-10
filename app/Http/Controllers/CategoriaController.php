<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Arquivo;
use Validator;
use App\Http\Controllers\ArquivoController;



class CategoriaController extends Controller
{

    public function lista(){
        
        $data = $this->data;
        $tituloLista = 'Categorias';

        $lista = Categoria::all();
        return view('painel.categorias.lista', compact('data','lista','tituloLista'));
    }

    public function formulario($action, $id = ''){

        $ref = uniqid();
        $actionForm = 'admin/salvar-categoria';
        $item = [];

        if($action == 'edit'){
            
            $item   = Categoria::find($id);
            $ref    = $item->ref;
        }


        $compact = compact('ref', 'item','action','actionForm');

     
        return view('painel.categorias.formulario', $compact);
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

            $x = Categoria::updateOrCreate(['id' => $request->id],$request->all())->id;

        }
 
        echo json_encode($frmData);
          
    }

    public function destroy(Request $request)
    {
        $status = 1;

        $arquivo = new ArquivoController;
        
        $item       = Categoria::find($request->id);
        $ref        = $item->ref;
        $imagens    = Arquivo::where('ref', $ref)->pluck('arquivo');

        foreach($imagens as $img){
            $arquivo->excluir($img);
        }

        $item->delete();

        echo json_encode($status);

    }
}
