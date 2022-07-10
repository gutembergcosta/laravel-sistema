<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Cadastro;
use Validator;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;




class CadastroController extends Controller
{

    public function lista(){
        
        $data = $this->data;

        $lista = Cadastro::where('aprovado', 'n')->get();
        return view('painel.cadastros.lista', compact('data','lista'));
    }

    public function formulario($action, $id = ''){

        $ref = uniqid();
        $actionForm = 'admin/salvar-cadastro';
        $item = [];
        $galeria = FALSE;

        if($action == 'edit'){
            $item   = Cadastro::find($id);
        }
   
        $compact = compact('ref', 'item','action', 'actionForm');
     
        return view('painel.cadastros.formulario', $compact);
    }

    public function salvar(Request $request){

        $validator = Validator::make($request->all(), [
            

            'nome'          => 'required',
            'telefone'      => 'required',
            'endereco'      => 'required',
            'numero'        => 'required',
            'uf'            => 'required',
            'bairro'        => 'required',
            'cidade'        => 'required',
            'senha'         => 'required',
        ]);

        if($validator->fails()){
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()) {

            $frmData['msg']         = 'Item salvo com sucesso';
            $frmData['destino']     = route('admin.cadastros');
            $request['aprovado']    = 's';
            $request['password']    = Hash::make($request->senha);

            

            Cadastro::updateOrCreate(['id' => $request->id],$request->all())->id; 

            $user   = new UserController;
            $email  = new EmailController;
        
            $user->novoCadastro($request);
            $email->msgNovoUsuario($request);

        }
 
        echo json_encode($frmData);
          
    }

    public function inserir($data){

        $data['aprovado'] = 'n';

        Cadastro::create($data);

    }

    public function pagina($slug = ''){


        $destino = ($slug) ? 'site.artigo' : 'site.artigos';
    
        return view($destino);
    
    }

    public function destroy(Request $request)
    {
        $status = 1;
        
        $item = Cadastro::find($request->id);

        echo json_encode($status);

    }




}
