<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\CadastroController;
use App\Rules\EmailCadastrado;
 


class EmailController extends Controller
{

    public function __construct(){
        parent:: __construct(); 

        $this->emailTo = 'consorcionetbrasil@gmail.com';
        //$this->emailTo = 'gutembergcosta01@gmail.com';
        $this->cadastro = new CadastroController;
    }

    public function contactForm(Request $request){

        $validator = Validator::make($request->all(), [
            'nome'      => 'required',
            'telefone'  => 'required',
            'texto'     => 'required',
        ]);

        if($validator->fails()){
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()) {

            $frmData['msg']        = 'Email enviado com sucesso';
            $frmData['destino']    = 'reload';

            $dataMsg['tipoForm']   = 'contato';
            $dataMsg['assunto']    = 'Mensagem do site';
            $dataMsg['nome']       = $request->nome;
            $dataMsg['email']      = $request->email;
            $dataMsg['telefone']   = $request->telefone;
            $dataMsg['texto']      = $request->texto;

            \Mail::to($this->emailTo)->send(new \App\Mail\NewMail($dataMsg));

        }

        echo json_encode($frmData);

    }


    public function cadastroForm(Request $request){

        $validator = Validator::make($request->all(), [
            'nome'          => 'required',
            'telefone'      => 'required',
            'endereco'      => 'required',
            'numero'        => 'required',
            'uf'            => 'required',
            'bairro'        => 'required',
            'cidade'        => 'required',
            'email'         => ['required', new EmailCadastrado],
        ]);

        if($validator->fails()){
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()){

            $frmData['msg']             = 'Email enviado com sucesso';
            $frmData['destino']         = 'reload';

            $dataMsg['tipoForm']        = 'cadastro';
            $dataMsg['assunto']         = 'Solicitação de cadastro';
            $dataMsg['titulo']          = $request;
            $dataMsg['nome']            = $request->nome;
            $dataMsg['email']           = $request->email;
            $dataMsg['telefone']        = $request->telefone;
            $dataMsg['endereco']        = $request->endereco;
            $dataMsg['numero']          = $request->numero;
            $dataMsg['complemento']     = $request->complemento;
            $dataMsg['bairro']          = $request->bairro;
            $dataMsg['cidade']          = $request->cidade;
            $dataMsg['uf']              = $request->uf;
            $dataMsg['senha']           = $request->senha;


            $dataMsgUser                = $dataMsg;
            $dataMsgUser['tipoForm']    = 'pre-cadastro';
            $dataMsgUser['assunto']     = 'Solicitação de cadastro';


            \Mail::to($dataMsg['email'])->send(new \App\Mail\NewMail($dataMsgUser));
            \Mail::to($this->emailTo)->send(new \App\Mail\NewMail($dataMsg));
            
            $this->cadastro->inserir($dataMsgUser);
            
        }

        echo json_encode($frmData);

    }

    public function orcamentoForm(Request $request){

        $validator = Validator::make($request->all(), [
            'titulo'    => 'required',
            'nome'      => 'required',
            'email'     => 'required|email',
            'telefone'  => 'required',
            'valor'     => 'required',
        ]);

        if($validator->fails()){
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()) {

            $frmData['msg']         = 'Email enviado com sucesso';
            $frmData['destino']     = 'reload';

            $dataMsg['tipoForm']   = 'orcamento';
            $dataMsg['assunto']    = 'Solicitação de orçamento';
            $dataMsg['titulo']     = $request->titulo;
            $dataMsg['nome']       = $request->nome;
            $dataMsg['email']      = $request->email;
            $dataMsg['telefone']   = $request->telefone;
            $dataMsg['valor']      = $request->valor;

            \Mail::to($this->emailTo)->send(new \App\Mail\NewMail($dataMsg));

        }

        echo json_encode($frmData);

    }

    public function msgNovoUsuario($data){
  
        $dataForm               = $data->all();
        $dataForm['tipoForm']   = 'cadastro-aprovado';
        $dataForm['assunto']    = 'Cadastro Aprovado';
        $dataForm['email']      = $data->email;
        $dataForm['senha']      = $data->senha;

        \Mail::to($dataForm['email'])->send(new \App\Mail\NewMail($dataForm));

    }



}
