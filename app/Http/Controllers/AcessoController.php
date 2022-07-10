<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcessoController extends Controller
{
    public function __construct(){
        parent:: __construct(); 

              
    }

    public function login(){

        $data = $this->data;
   

        return view('painel.login', compact('data') );
    }

    public function esqueci(){

        $data = [];

        return view('painel.esqueci', $data);
    }


    public function formulario(string $slug){

        $data = [];


        return view("painel.form-$slug", $data);
    }

    public function entrar(){

       $frmData['status'] = 0;
       $frmData['destino'] = $this->data['base_url'].'/admin/home';

       echo json_encode($frmData);
         
    }

    public function salvar(){

        echo 'aki';

        $frmData['status'] = 0;
        $frmData['destino'] = $this->data['base_url'].'/admin/home';
 
        echo json_encode($frmData);
          
     }

   


}
