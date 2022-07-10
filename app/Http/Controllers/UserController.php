<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\UserDado;
use App\Arquivo;
use App\Http\Controllers\ArquivoController;
use Validator;


class UserController extends Controller
{

    public function lista(){

        $data = $this->data;

        $lista = DB::table('users')
            ->join('user_dados', 'users.id', '=', 'user_dados.user_id')
            ->select('users.*', 'user_dados.tipo', 'user_dados.nome', 'user_dados.telefone', 'user_dados.bloqueado')
            ->where('user_dados.tipo', 'representante')
            ->get();

        return view('painel.users.lista', compact('data', 'lista'));
    }

    public function formulario($action, $id = ''){

        $ref = uniqid();
        $actionForm = 'admin/salvar-user';
        $actionFormSenha = 'admin/salvar-senha';
        $item = [];
        $img = '';

        if ($action == 'edit') {

            $item           = User::find($id);
            $ref            = $item->ref;

            $img = $item->arquivos->where('tipo', 'destaque')->last();
        }

        $dataImgDestaque = ['ref' => $ref, 'img' => $img, 'tipo' => 'destaque', 'titulo' => 'Imagem Destaque'];

        $compact = compact('ref', 'item', 'actionForm', 'dataImgDestaque', 'actionFormSenha');

        return view('painel.users.formulario', $compact);
    }

    public function perfil(){

        $actionForm     = 'admin/salvar-user';
        $actionFormSenha = 'admin/salvar-senha';
        $item           = Auth::user();
        $ref            = $item->ref;

        $img = $item->arquivos->where('tipo', 'destaque')->last();


        $dataImgDestaque = ['ref' => $ref, 'img' => $img, 'tipo' => 'destaque', 'titulo' => 'Imagem Destaque'];

        $compact = compact('ref', 'item', 'actionForm', 'dataImgDestaque', 'actionFormSenha');

        return view('painel.users.formulario', $compact);
    }

    public function salvar(Request $request){

        $matrizValidate = [
            'nome'          => 'required',
            'telefone'      => 'required',
            'endereco'      => 'required',
            'numero'        => 'required',
            'bairro'        => 'required',
            'cidade'        => 'required',
            'uf'            => 'required',
        ];

        if (!isset($request->id)) {
            $matrizValidaLogin = [
                'password' => 'required',
                'email'    => 'required',
            ];

            $matrizValidate = array_merge($matrizValidate,$matrizValidaLogin);
        }

        $validator = Validator::make($request->all(), $matrizValidate);

        if ($validator->fails()) {
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()) {

            $frmData['msg']         = 'Item salvo com sucesso';
            $frmData['destino']     = 'reload';

            $request['name']        = $request->nome;
            $request['tipo']        = 'representante';

            $id = User::updateOrCreate(['id' => $request->id], $request->all())->id;

            $request['user_id'] = $id;

            UserDado::updateOrCreate(['user_id' => $id], $request->all())->id;
        }

        echo json_encode($frmData);
    }

    public function salvarSenha(Request $request){

        $matrizValidate = [
            'novaSenha01'   => 'required|same:novaSenha02',
            'user_id'       => 'required',
        ];


        $validator = Validator::make($request->all(), $matrizValidate);

        if ($validator->fails()) {
            $frmData['msg']         = 'As senhas devem ser iguais';
        }

        if ($validator->passes()) {


            $frmData['msg']         = 'Item salvo com sucesso';
            $frmData['destino']     = 'reload';

            $user_id     = $this->realUserId($request->user_id);
            $novaSenha   = Hash::make($request->novaSenha01);


            User::whereId($user_id)->update(['password' => $novaSenha]);

        }

        echo json_encode($frmData);
    }

    public function realUserId($id){

        if(Auth::user()->userDados->tipo == 'admin'){
            return $id;
        }else{
            return Auth::user()->id;
        }

    }

    public function novoCadastro($data){

        $dataForm                = $data->all();
        $dataForm['name']        = $data['nome'];
        $dataForm['tipo']        = 'representante';

        $id = User::create($dataForm)->id;

        $dataForm['user_id'] = $id;

        UserDado::updateOrCreate(['user_id' => $id], $dataForm)->id;
    }

    public function destroy(Request $request){

        $status = 1;

        $arquivo = new ArquivoController;

        $item       = User::find($request->id);
        $ref        = $item->ref;
        $imagens    = Arquivo::where('ref', $ref)->pluck('arquivo');

        foreach ($imagens as $img) {
            $arquivo->excluir($img);
        }

        $item->delete();
        UserDado::where('user_id', $item->id)->delete();

        echo json_encode($status);
    }

    public function login(){

        $actionForm = 'admin.entrar';

        return view('site.login', compact('actionForm'));
    }

  

    

    public function logout(Request $request){
        //Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }


    public function cadastro(){

        return view('site.cadastro');
    }

    public function verificar(Request $request){

        $validator = Validator::make($request->all(), [

            'email'     => 'required',
            'senha'      => 'required',
        ]);



        if ($validator->fails()) {
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()) {


            $email = $request->email;
            $senha  = $request->senha;

            if (auth()->attempt(['email' => $email, 'password' => $senha])) {

                $frmData['destino']  = route('admin.home');
            } else {

                $frmData['msg']         = 'Usuário ou senha inválidos!';
            }
        }

        echo json_encode($frmData);
    }
}
