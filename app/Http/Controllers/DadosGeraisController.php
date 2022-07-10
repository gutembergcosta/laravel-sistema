<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MetaDado;
use App\MetaTexto;
use App\Arquivo;
use Validator;



class DadosGeraisController extends Controller
{

    public function formulario($action, $id = ''){

        $ref = uniqid();
        $actionForm = 'admin/salvar-dados';

        
        $arquivos = Arquivo::all();

        $item = $this->getDadosItem();
        

        $galeria = $arquivos->where('tipo', 'slide')->all();
        $marcas = $arquivos->where('tipo', 'marca')->all();
        $logo = $arquivos->where('tipo', 'logo')->last();
        $institucional = $arquivos->where('tipo', 'institucional')->last();

        $dataGaleria = [
            'ref'       => 'dados-gerais', 
            'galeria'   => $galeria, 
            'tipo'      => 'slide',
            'titulo'    => 'Slides'
        ];

        $dataMarcas = [
            'ref'       => 'dados-gerais', 
            'galeria'   => $marcas, 
            'tipo'      => 'marca',
            'titulo'    => 'Marcas'
        ];

        $dataImgDestaque = [
            'ref'       => 'dados-gerais', 
            'img'       => $logo, 
            'tipo'      => 'logo',
            'titulo'    => 'Logo', 
            'thumb'     => 'mini' 
        ];

        $dataImgInstitucional = [
            'ref'       => 'dados-gerais', 
            'img'       => $institucional, 
            'tipo'      => 'institucional',
            'titulo'    => 'Institucional', 
            'thumb'     => 'mini' 
        ];

        $compact = compact('actionForm','dataGaleria','dataImgDestaque','item','dataMarcas','dataImgInstitucional');

        return view('painel.dados-gerais.formulario', $compact);
    }


    public function getDadosGerais(){
       

        if(!session('dados-gerais')){

            $item = $this->getDadosItem();

            session(['dados-gerais' => $item]);

        } 

        return session('dados-gerais');

    }

    public function getDadosItem(){


        $lista = MetaDado::all();
        $textos = MetaTexto::all();

        $item['tel01']  = $lista->where('nome', 'tel01')->first()->valor;
        $item['tel02']  = $lista->where('nome', 'tel02')->first()->valor;
        $item['tel03']  = $lista->where('nome', 'tel03')->first()->valor;
        $item['email']  = $lista->where('nome', 'email')->first()->valor;
        $item['facebook']  = $lista->where('nome', 'facebook')->first()->valor;
        $item['instagram']  = $lista->where('nome', 'instagram')->first()->valor;
        $item['youtube']  = $lista->where('nome', 'youtube')->first()->valor;
        $item['linkedin']  = $lista->where('nome', 'linkedin')->first()->valor;
        $item['zap']  =  numeros($lista->where('nome', 'zap')->first()->valor);
        $item['email']  = $lista->where('nome', 'email')->first()->valor;
        $item['url_video_faq']  = $lista->where('nome', 'url_video_faq')->first()->valor;

        $item['institucional']  = $textos->where('nome', 'institucional')->first()->valor;
        $item['intro_site']  = $textos->where('nome', 'intro_site')->first()->valor;
        $item['intro_planos']  = $textos->where('nome', 'intro_planos')->first()->valor;
        $item['intro_contemplados']  = $textos->where('nome', 'intro_contemplados')->first()->valor;
        $item['intro_representantes']  = $textos->where('nome', 'intro_representantes')->first()->valor;
        $item['intro_contato']  = $textos->where('nome', 'intro_contato')->first()->valor;
        $item['intro_cadastro']  = $textos->where('nome', 'intro_cadastro')->first()->valor;
        $item['intro_artigos']  = $textos->where('nome', 'intro_artigos')->first()->valor;
        $item['endereco']  = $textos->where('nome', 'endereco')->first()->valor;
        $item['endereco_full']  = $textos->where('nome', 'endereco_full')->first()->valor;
        $item['faq']  = $textos->where('nome', 'faq')->first()->valor;
        $item['txt_contrato']  = $textos->where('nome', 'txt_contrato')->first()->valor;

        return $item;

    }

    public function salvar(Request $request){

        $validator = Validator::make($request->all(), [
            
            'institucional'     => 'required',
            'tel01'      => 'required',
        ]);

        if($validator->fails()){
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes()) {

            $frmData['msg']         = 'Item salvo com sucesso';
            $frmData['destino']     = 'reload';


            MetaDado::where('nome', 'tel01')->update(['valor' => $request->tel01]);
            MetaDado::where('nome', 'tel02')->update(['valor' => $request->tel02]);
            MetaDado::where('nome', 'tel03')->update(['valor' => $request->tel03]);
            MetaDado::where('nome', 'email')->update(['valor' => $request->email]);
            MetaDado::where('nome', 'facebook')->update(['valor' => $request->facebook]);
            MetaDado::where('nome', 'instagram')->update(['valor' => $request->instagram]);
            MetaDado::where('nome', 'youtube')->update(['valor' => $request->youtube]);
            MetaDado::where('nome', 'linkedin')->update(['valor' => $request->linkedin]);
            MetaDado::where('nome', 'zap')->update(['valor' => $request->zap]);
            MetaDado::where('nome', 'url_video_faq')->update(['valor' => $request->url_video_faq]);

            MetaTexto::where('nome', 'institucional')->update(['valor' => $request->institucional]);
            MetaTexto::where('nome', 'intro_site')->update(['valor' => $request->intro_site]);
            MetaTexto::where('nome', 'intro_planos')->update(['valor' => $request->intro_planos]);
            MetaTexto::where('nome', 'intro_contemplados')->update(['valor' => $request->intro_contemplados]);
            MetaTexto::where('nome', 'intro_representantes')->update(['valor' => $request->intro_representantes]);
            MetaTexto::where('nome', 'intro_contato')->update(['valor' => $request->intro_contato]);
            MetaTexto::where('nome', 'intro_cadastro')->update(['valor' => $request->intro_cadastro]);
            MetaTexto::where('nome', 'endereco')->update(['valor' => $request->endereco]);
            MetaTexto::where('nome', 'endereco_full')->update(['valor' => $request->endereco_full]);
            MetaTexto::where('nome', 'faq')->update(['valor' => $request->faq]);
            MetaTexto::where('nome', 'txt_contrato')->update(['valor' => $request->txt_contrato]);

        }
 
        echo json_encode($frmData);
          
    }

    public function pagina(){

        return view('site.institucional');

    }

}
