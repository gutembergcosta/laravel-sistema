<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arquivo;
use Validator;
use Image;
use File;


class ArquivoController extends Controller
{

    public function upload(Request $request){

        $validator = Validator::make($request->all(), [
            'myfile' => 'required|mimes:jpg,jpeg,png,pdf,xls,xlsx|max:5000',
        ]);

        if($validator->fails()){
            $dataForm['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()) {

            $destinationPath = public_path('uploads');
            $extensao = $request->myfile->extension();
            $fileName = uniqid().'.'.$extensao;
            $arquivo = $request->file('myfile');
            $tipo = $request->tipo;
            $ref = $request->ref;
            
            if(in_array($tipo, ['destaque','arquivo','plano'])) $this->verificaItem($ref, $tipo);
            
            if(in_array($extensao, ['jpg','jpeg','png'])){
                $this->resize('mini',600,600,$arquivo,$fileName,$destinationPath,'resize');
                $this->resize('max',1200,1200,$arquivo,$fileName,$destinationPath,'resize');
                $this->resize('square',600,600,$arquivo,$fileName,$destinationPath,'fit');
                $this->resize('thumb',200,200,$arquivo,$fileName,$destinationPath,'fit');

                if($tipo == 'plano') $this->resize('max',1200,600,$arquivo,$fileName,$destinationPath,'resize');
                if($tipo == 'slider') $this->resize('max',2000,800,$arquivo,$fileName,$destinationPath,'resize');

            }

            $arquivo->move($destinationPath, "original-$fileName");

            $dataForm                   = $request->all();
            $dataForm['arquivo']        = $fileName;
            $dataForm['nome']           = pathinfo($request->myfile->getClientOriginalName())["filename"];
            $dataForm['miniatura']      = url('public/uploads/thumb-'.$fileName);
            $dataForm['max']            = url('public/uploads/max-'.$fileName);

            Arquivo::create($dataForm);

        }
 
        echo json_encode($dataForm);
   
    }
    
    public function resize($nome,$largura,$altura,$arquivo,$fileName,$destinationPath,$tipo){

        $img = Image::make($arquivo->getRealPath());

        if($tipo == 'resize'){
            $img->getWidth() > $img->getHeight() ? $altura = null : $largura = null;
        }

        $img->$tipo($largura, $altura, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$nome.'-'.$fileName);

    }

    public function verificaItem($ref,$tipo){
        

        $item = Arquivo::where('ref', $ref )->where('tipo', $tipo)->get();
        
        if($item->count() > 0){
            foreach($item as $registro){
                $this->excluir($registro->arquivo);
            }
        }
        
    }
  
    public function destroy(Request $request){

        $status = 1;

        $this->excluir($request->item);

        echo json_encode($status);
        
    }

    public function excluir($item){

        $prefixos = ['mini','max','square','thumb','original'];

        foreach($prefixos as $prefixo){

            $urlFile = 'uploads/'.$prefixo.'-'.$item; 

            if(File::exists(public_path($urlFile))) File::delete(public_path($urlFile));

        }

        Arquivo::where('arquivo', $item)->delete();

    }

}
