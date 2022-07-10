<?php

namespace App\Http\Controllers;

use App\Artigo;
use App\Arquivo;
use App\Produto;
use App\Http\Controllers\DadosGeraisController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class PaginasController extends Controller
{
    public function __construct() {
        
        $dadosGerais = new DadosGeraisController;

        $this->dadosGerais = $dadosGerais->getDadosGerais();
        $this->produtos = Produto::limit(8)->get();
        $this->artigos = Artigo::limit(8)->get();

    }

    public $seletores = [

        'tratores' => "",
        'imovel' => "",
        'veiculos' => "",

    ];


    public function Inicio(){

        //echo Hash::make('0102'); exit;

        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $slides = Arquivo::where('tipo', 'slide')->get();
        $marcas = Arquivo::where('tipo', 'marca')->get();
        $numeros = $this->numerosContemplados();
        
        $compact = compact(
            'slides',
            'dadosGerais',
            'produtos',
            'marcas',
            'numeros',
        );

        return view('site.inicio',$compact);
    }

    private function numerosContemplados(){
    
        $start_date = Carbon::createFromFormat('Y-m-d', '2022-01-01');
        $end_date = Carbon::createFromFormat('Y-m-d', date("Y-m-d"));
    
        $dias = $start_date->diffInDays($end_date);
        $meses = $start_date->diffInMonths($end_date);
        $anos = $start_date->diffInYears($end_date);

        $matriz = [
            'carros'        => $dias + 600 + ceil($dias * 0.1),
            'imoveis'       => $dias + 700 + ceil($dias * 0.3),
            'motos'         => $dias + 500 + ceil($dias * 0.2),
            'caminhoes'     => $dias + 700 + ceil($dias * 0.7),
            'eletronicos'   => $dias + 500 + ceil($dias * 0.4),

        ];

        return $matriz;
    }

    public function contato(){

        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $tituloPagina = 'Institucional';
        $actionForm = 'enviar-email';
        
        $compact = compact(
            'produtos',
            'dadosGerais',
            'tituloPagina',
            'actionForm',
        );

        return view('site.contato',$compact);
    }

    public function cadastro(){

        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $tituloPagina = 'Cadastro';
        $actionForm = 'enviar-cadastro';
        
        $compact = compact(
            'produtos',
            'dadosGerais',
            'tituloPagina',
            'actionForm',
        );

        return view('site.cadastro',$compact);
    }




    public function institucional(){

        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $textual['texto'] = $this->dadosGerais['institucional'];
        $textual['img'] = Arquivo::where('tipo', 'institucional')->first()['arquivo'];

        
        $tituloPagina = 'Institucional';
        
        $compact = compact(
            'dadosGerais',
            'produtos',
            'textual',
            'tituloPagina',
        );

        return view('site.institucional',$compact);
    }

    public function faq(){

        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $textual['texto'] = $this->dadosGerais['faq'];
        $textual['video'] = extractYoutubeURL($this->dadosGerais['url_video_faq']);
      
        $tituloPagina = 'Perguntas Frequentes';
        
        $compact = compact(
            'dadosGerais',
            'produtos',
            'textual',
            'tituloPagina',
        );

        return view('site.faq',$compact);
    }

    public function planos(){

        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $textual['texto'] = $this->dadosGerais['institucional'];
        $tituloPagina = 'Planos';
        
        $compact = compact(
            'dadosGerais',
            'produtos',
            'textual',
            'tituloPagina',
        );

        return view('site.planos',$compact);
    }

    public function plano($slug){


        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $produto = Produto::where('slug', $slug)->first();
        $tituloPagina = $produto['nome'];
        $actionForm = 'enviar-orcamento';

        $valor = 
        
        
        $compact = compact(
            'dadosGerais',
            'tituloPagina',
            'produtos',
            'produto',
            'actionForm',
        );

        return view('site.plano',$compact);
    }


    

    public function artigos(){

        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $artigos = $this->artigos;
        $tituloPagina = 'Artigos';
      
        $compact = compact(
            'dadosGerais',
            'tituloPagina',
            'produtos',
            'artigos',
            
        );

        return view('site.artigos',$compact);
    }

    public function artigo($slug){

        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $artigos = $this->artigos;
        $artigo = $artigos->find($slug);
        $tituloPagina = $artigo['nome'];
        $textual['texto'] = $artigo['texto'];
        $textual['img'] = $artigo->arquivos->where('tipo', 'destaque')->first()['arquivo'];


        
        
        $compact = compact(
            'dadosGerais',
            'tituloPagina',
            'produtos',
            'textual',
        );

        return view('site.artigo',$compact);
    }

    public function representantes($slug = NULL){

        $dadosGerais = $this->dadosGerais;
        $produtos = $this->produtos;
        $representantes = [];
        $tituloPagina = 'Representantes';
      
        $compact = compact(
            'dadosGerais',
            'tituloPagina',
            'produtos',
            'representantes',
            
        );

        return view('site.representantes',$compact);
    }

    

    
}
