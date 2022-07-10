<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $templateArquivo = [
        'contato'               => 'email.mensagem',
        'orcamento'             => 'email.orcamento',
        'cadastro'              => 'email.cadastro',
        'pre-cadastro'          => 'email.pre-cadastro',
        'cadastro-aprovado'     => 'email.cadastro-aprovado',
    ];

    public function __construct($data){
        $this->data = $data;
    }
   
    public function build()
    {
        $arquivo = '';
        $data = $this->data;

        $compact = compact('data');

        return $this->view($this->templateArquivo[$data['tipoForm']], $compact)->subject($data['assunto']);

    }
}
