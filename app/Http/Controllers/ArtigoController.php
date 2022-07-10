<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;
use App\Arquivo;
use Validator;
use App\Http\Controllers\ArquivoController;





class ArtigoController extends Controller
{

    public function lista(){
        
        $data = $this->data;

        $lista = Artigo::all();
        return view('painel.artigos.lista', compact('data','lista'));
    }

    public function formulario($action, $id = ''){

        $ref = uniqid();
        $actionForm = 'admin/salvar-artigo';
        $item = [];
        $galeria = FALSE;
        $img = '';

        if($action == 'edit'){
            
            $item   = Artigo::find($id);
            $ref    = $item->ref;

            $galeria = $item->arquivos->where('tipo', 'galeria')->all();
            $img = $item->arquivos->where('tipo', 'destaque')->last();

        }

        $dataGaleria = ['ref' => $ref, 'galeria' => $galeria, 'tipo' => 'galeria','titulo' => 'Galeria'];
        $dataImgDestaque = ['ref' => $ref, 'img' => $img, 'tipo' => 'destaque','titulo' => 'Imagem Destaque'];

        $compact = compact('ref', 'item','action','dataImgDestaque','dataGaleria', 'actionForm');

     
        return view('painel.artigos.formulario', $compact);
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

            

            $x = Artigo::updateOrCreate(['id' => $request->id],$request->all())->id;

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
        
        $item       = Artigo::find($request->id);
        $ref        = $item->ref;
        $imagens    = Arquivo::where('ref', $ref)->pluck('arquivo');

        foreach($imagens as $img){
            $arquivo->excluir($img);
        }

        $item->delete();

        echo json_encode($status);

    }

    public function apiLista(){
        
        $data = $this->data;

        $lista = Artigo::all();
        return $lista;
    }

    public function apiGet($action, $id = ''){

        $ref = uniqid();
        $actionForm = 'admin/salvar-artigo';
        $item = [];
        $galeria = FALSE;
        $img = '';

        if($action == 'edit'){
            
            $item   = Artigo::find($id);
            $ref    = $item->ref;

            $galeria = $item->arquivos->where('tipo', 'galeria')->all();
            $img = $item->arquivos->where('tipo', 'destaque')->last();

        }

        $dataGaleria = ['ref' => $ref, 'galeria' => $galeria, 'tipo' => 'galeria','titulo' => 'Galeria'];
        $dataImgDestaque = ['ref' => $ref, 'img' => $img, 'tipo' => 'destaque','titulo' => 'Imagem Destaque'];

        $compact = compact('ref', 'item','action','dataImgDestaque','dataGaleria', 'actionForm');

        
        return $compact;
    }


    public function apiSalvar(Request $request){



            $frmData['msg']         = 'Item salvo com sucesso';
            $frmData['destino']     = 'reload';


            $request['slug'] = slug($request->nome);

            

            $x = Artigo::updateOrCreate(['id' => $request->id],$request->all())->id;

 
        echo json_encode($frmData);
          
    }

    
}
