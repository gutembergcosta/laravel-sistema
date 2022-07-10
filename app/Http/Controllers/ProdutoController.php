<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Arquivo;
use Validator;
use App\Http\Controllers\ArquivoController;



class ProdutoController extends Controller
{

    public function lista(){

        
        $data = $this->data;

        $lista = Produto::all();
        return view('painel.planos.lista', compact('data','lista'));
    }

    public function formulario($action, $id = ''){

        $ref = uniqid();
        $actionForm = 'admin/salvar-plano';
        $item = [];
        $dataGaleria = '';
        $dataImgDestaque = '';

        if($action == 'edit'){
            
            $item   = Produto::find($id);
            $ref    = $item->ref;

            $dataGaleria= $item->arquivos->where('tipo', 'galeria')->all();
            $dataImgDestaque = $item->arquivos->where('tipo', 'plano')->last();

        }

        $dataGaleria = ['ref' => $ref, 'galeria' => $dataGaleria,  'tipo' => 'galeria','titulo' => 'Galeria'];
        $dataImgDestaque = ['ref' => $ref, 'img' => $dataImgDestaque, 'tipo' => 'plano','titulo' => 'Imagem Destaque'];

        $compact = compact('ref', 'item','action','actionForm','dataImgDestaque','dataGaleria');
     
        return view('painel.planos.formulario', $compact);

    }

    public function salvar(Request $request){

        $validator = Validator::make($request->all(), [
            'texto'     => 'required',
            'nome'      => 'required',
        ]);

        if($validator->fails()){
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()) {

            $frmData['msg']         = 'Item salvo com sucesso';
            $frmData['destino']     = 'reload';

            $request['slug'] = slug($request->nome);

            $x = Produto::updateOrCreate(['id' => $request->id],$request->all())->id;

        }
 
        echo json_encode($frmData);
          
    }

    public function pagina($slug = ''){


        $destino = ($slug) ? 'site.planos' : 'site.plano';

        return view($destino);

    }

    public function destroy(Request $request)
    {
        $status = 1;


        $arquivo = new ArquivoController;
        
        $item       = Produto::find($request->id);
        $ref        = $item->ref;
        $imagens    = Arquivo::where('ref', $ref)->pluck('arquivo');

        foreach($imagens as $img){
            $arquivo->excluir($img);
        }

        $item->delete();

        echo json_encode($status);

    }
}
