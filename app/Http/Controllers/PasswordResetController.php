<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


use App\User;
use App\PasswordReset;
use Validator;
use App\Rules\VerificaEmail;
use Mail;
use Carbon\Carbon;



class PasswordResetController extends Controller
{
    public function resetar(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => ['required', new VerificaEmail],
        ]);

        if($validator->fails()){
            $frmData['msg'] = 'Email não foi encontrado!';
        }

        if ($validator->passes()){

            $token = uniqid();
            $this->emailDestino               = $request->email;
            //$this->emailDestino               = "teste@consorcionetbrasil.com.br";
            
            $frmData['msg']             = 'Email de recuperação enviado com sucesso';
            $frmData['destino']         = 'reload';

            $dataForm                   = $request->all();
            $dataForm['created_at']     = Carbon::now(); 
            $dataForm['token']          = $token;

            $dataMsg['titulo']          = 'Redefinir senha';
            $dataMsg['url']             = url('nova-senha/'.$token);

            PasswordReset::create($dataForm); 

            Mail::send('email.redefinir', $dataMsg, function($message) {
                $message->to($this->emailDestino, 'Redefinir senha')->subject('Redefinir senha');
                $message->from('teste@consorcionetbrasil.com.br','Consórcio Net Brasil');
            });
            
        }

        echo json_encode($frmData);

        
    }

    public function gerarNovaSenha(Request $request){

        $erro = 0;

        $validator = Validator::make($request->all(), [
            'novaSenha01'   => 'required|same:novaSenha02|min:6|max:64',
            'token'         => 'required',
        ]);

        if($validator->fails()){
            $frmData['msg'] = 'As senhas devem ser iguais com mínimo de 6 caracteres!';
        }

         

        if ($validator->passes()){

            $erro == 0;

            $dataUser = DB::table('users')
                    ->join('password_resets', 'password_resets.email', '=', 'users.email')
                    ->select('users.*','password_resets.created_at')
                    ->where('password_resets.token', $request->token)
                    ->first();


            $now = Carbon::now();

            $dataFinal = Carbon::parse($dataUser->created_at);

            $diferenca = $dataFinal->diffInHours($now);

            if($diferenca > 10){
                ++$erro;
                $frmData['msg'] = 'O link de renovação expirou, solicite novamente a alteração da sua senha!';
            }

            if($erro ==0){
                $user_id    = $dataUser->id;
                $novaSenha  = Hash::make($request->novaSenha01);
                
                $frmData['msg']             = 'Senha alterada com sucesso';
                $frmData['destino']         = url('/login');
    
                User::whereId($user_id)->update(['password' => $novaSenha]);
            } 

            
            
        }

        echo json_encode($frmData);

        
    }


    public function redefinir(){

        $actionForm = 'redefinir';

        return view('site.redefinir', compact('actionForm'));
    }

    public function novaSenha($token){

        $actionForm = 'gerar-nova-senha';

        return view('site.nova-senha', compact('actionForm','token'));
    }

    
}
