<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;
use App\Arquivo;
use Validator;
use App\Http\Controllers\ArquivoController;


class ApiVueController extends Controller
{
    public function lista(){
        
        $data = $this->data;

        $lista = Artigo::all();
        return $lista;
    }

    public function getItem($action, $id = ''){

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


    public function salvar(Request $request){

        $frmData['msg']         = 'Item salvo com sucesso';
        $frmData['destino']     = 'reload';

        Artigo::updateOrCreate(['id' => $request->id],$request->all())->id;

        return $frmData;
 
          
    }

    public function files(){
        

        $lista = Artigo::all();
        return $lista;
    }

    
}
