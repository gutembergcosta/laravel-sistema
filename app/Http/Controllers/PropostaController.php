<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposta;
use App\Arquivo;
use App\User;
use App\MetaTexto;
use App\MetaDado;
use Validator;
use App\Http\Controllers\ArquivoController;
use Illuminate\Support\Facades\Auth;



class PropostaController extends Controller
{

    public $statusNome = [
        'nova'      => 'Nova Proposta',
        'analise'   => 'Análise',
        'aprovada'  => 'Aprovada',
        'recusada'  => 'Recusada',
    ];

    public $statusCor = [
        'nova'      => 'info',
        'analise'   => 'warning',
        'aprovada'  => 'success',
        'recusada'  => 'danger',
    ];

    public $ordemProposta = [
        'nova'      => 1,
        'analise'   => 2,
        'aprovada'  => 3,
        'recusada'  => 4,
    ];

    public $nomeTipoPessoa = [
        'pessoa-fisica'     => 'Pessoa física',
        'pessoa-juridica'   => 'Pessoa jurídica',
        ''                  => '',
    ];

    public $generoNome = [
        'm' => 'Masculino',
        'f'  => 'Feminino',
        ''          => '',
    ];
    
     

    public function lista()
    {

        $data = $this->data;

        $tipoUser = (Auth::user()->userDados->tipo == 'admin') ? 'admin' : 'user';
        $userId = Auth::user()->id;

        if($tipoUser == 'admin') $lista = Proposta::all();
        if($tipoUser == 'user') $lista = Proposta::where('user_id', $userId)->get();
        

        $lista->each(function($item) {
            $this->addAtributos($item,'tabela');
        });

        $lista = $lista->sortBy('ordem_proposta');

        return view('painel.propostas.lista', compact('data', 'lista', 'tipoUser'));

    }

    public function formulario($action, $param01 = '' ){

        $ref = uniqid();
        $actionForm = 'admin/salvar-proposta';
        $item = [];
        
        
        $galeria = FALSE;
        $img = $imgRGFrente = $imgRGVerso = $imgComprovanteEndereco = $imgContratoSocial =  $imgCnpj = '';
        $tipoUser = (Auth::user()->userDados->tipo == 'admin') ? 'admin' : 'user';

        if ($action == 'add') {
            $tipoProposta = $param01;
        }

        if ($action == 'edit') {

            $item   = Proposta::find($param01);      
            $ref    = $item->ref;
            $tipoProposta = $item->tipo_proposta;
            $item['data_nascimento'] = dataSimples($item->data_nascimento, 'site');
            $item['data_expedicao'] = dataSimples($item->data_expedicao, 'site');

            $imgRGFrente = $item->arquivos->where('tipo', 'rg-frente')->last();
            $imgRGVerso = $item->arquivos->where('tipo', 'rg-verso')->last();
            $imgComprovanteEndereco = $item->arquivos->where('tipo', 'comprovante-endereco')->last();
        
            $imgCnpj = $item->arquivos->where('tipo', 'cnpj')->last();
            $imgContratoSocial = $item->arquivos->where('tipo', 'contrato-social')->last();
        
        }

        $blocosImg = $this->blocosImg($ref, $imgRGFrente, $imgRGVerso, $imgComprovanteEndereco, $imgContratoSocial,$imgCnpj);


        $compact = compact('ref', 'item', 'action', 'blocosImg', 'actionForm', 'tipoUser','tipoProposta');
        

        return view('painel.propostas.formulario', $compact);
    }

    public function blocosImg($ref, $imgRGFrente, $imgRGVerso, $imgComprovanteEndereco, $imgContratoSocial,$imgCnpj){


        $bloco['dataImgRGFrente'] = [
            'ref' => $ref,
            'img' => $imgRGFrente,
            'tipo' => 'rg-frente',
            'titulo' => 'RG Frente'
        ];

        $bloco['dataImgRGVerso'] = [
            'ref' => $ref,
            'img' => $imgRGVerso,
            'tipo' => 'rg-verso',
            'titulo' => 'RG Verso'
        ];

        $bloco['dataImgCompEndereco'] = [
            'ref' => $ref,
            'img' => $imgComprovanteEndereco,
            'tipo' => 'comprovante-endereco',
            'titulo' => 'Comprovante de endereço'
        ];

        $bloco['dataImgContratoSocial'] = [
            'ref' => $ref,
            'img' => $imgContratoSocial,
            'tipo' => 'contrato-social',
            'titulo' => 'Contrato social'
        ];

        $bloco['dataImgCNPJ'] = [
            'ref' => $ref,
            'img' => $imgCnpj,
            'tipo' => 'cnpj',
            'titulo' => 'CNPJ'
        ];

        return $bloco;


    }

    public function informacoes($id){

        $ref = uniqid();
        $actionForm = 'admin/salvar-proposta';
        $galeria = FALSE;
        $img = $imgRGFrente = $imgRGVerso = $imgComprovanteEndereco = '';
        $tipoUser = (Auth::user()->userDados->tipo == 'admin') ? 'admin' : 'user';


        $item   = Proposta::find($id);
        $this->addAtributos($item);
        $representante = User::find($item->user_id);
        $tipoProposta = $item->tipo_proposta;
        $item['data_nascimento'] = dataSimples($item->data_nascimento, 'site');
        $item['data_expedicao'] = dataSimples($item->data_expedicao, 'site');

        $imgRGFrente = $item->arquivos->where('tipo', 'rg-frente')->last();
        $imgRGVerso = $item->arquivos->where('tipo', 'rg-verso')->last();
        $imgComprovanteEndereco = $item->arquivos->where('tipo', 'comprovante-endereco')->last();
        
        $imgCnpj = $item->arquivos->where('tipo', 'cnpj')->last();
        $imgContratoSocial = $item->arquivos->where('tipo', 'contrato-social')->last();
        
        
        $blocosImg = $this->blocosImg($ref, $imgRGFrente, $imgRGVerso, $imgComprovanteEndereco, $imgContratoSocial,$imgCnpj);


        $compact = compact('item', 'blocosImg', 'actionForm', 'tipoUser','representante','tipoProposta');

        return view('painel.propostas.informacoes', $compact);
    }

    public function imprimir($id){

        $ref = uniqid();
        $actionForm = 'admin/salvar-proposta';
        $galeria = FALSE;
        $img = $imgRGFrente = $imgRGVerso = $imgCompEndereco = $imgCnpj = $imgContratoSocial = '';
        $tipoUser = (Auth::user()->userDados->tipo == 'admin') ? 'admin' : 'user';


        $item   = Proposta::find($id);
        $this->addAtributos($item);
        $tipoProposta = $item->tipo_proposta;
        
        $representante = User::find($item->user_id);

        

        //dd($representante);
        //dd($item);

        $item['data_nascimento'] = dataSimples($item->data_nascimento, 'site');
        $item['data_expedicao'] = dataSimples($item->data_expedicao, 'site');

        //$logo = $item->arquivos->where('tipo', 'logo')->last()->arquivo;

        //$logo = $item->arquivos->where('tipo', 'logo')->last()->arquivo;

        $logo = Arquivo::where('tipo', 'logo')->get()->last()->arquivo;
        $txt_contrato = MetaTexto::where('nome', 'txt_contrato')->first()->valor;
        $tel01 = MetaDado::where('nome', 'tel01')->first()->valor;

        if($item->tipo_proposta == 'pessoa-fisica'){
            $imgRGFrente = $item->arquivos->where('tipo', 'rg-frente')->last()->arquivo;
            $imgRGVerso = $item->arquivos->where('tipo', 'rg-verso')->last()->arquivo;
            $imgCompEndereco = $item->arquivos->where('tipo', 'comprovante-endereco')->last()->arquivo;
        }

        if($item->tipo_proposta == 'pessoa-juridica'){
            
            $imgCnpj = $item->arquivos->where('tipo', 'cnpj')->last()->arquivo;
            $imgContratoSocial = $item->arquivos->where('tipo', 'contrato-social')->last()->arquivo;
        }
        
        $compact = compact(
            'item', 
            'imgRGFrente', 
            'imgRGVerso', 
            'imgCompEndereco', 
            'actionForm', 
            'tipoUser',
            'representante', 
            'imgCnpj', 
            'imgContratoSocial',
            'tipoProposta',
            'logo',
            'txt_contrato',
            'tel01'
        );

        return view('painel.propostas.imprimir', $compact);
    }

    public function salvar(Request $request){

        $arquivosEnviados = false;
        $customMessages = $matrizValidate = [];

        $matrizValidate['nome']                   = 'required';
        $matrizValidate['ref']                    = 'required';
        $matrizValidate['email']                  = 'required';
        $matrizValidate['data_nascimento']        = 'required';
        $matrizValidate['estado_civil']           = 'required';
        $matrizValidate['tel01']                  = 'required';
        $matrizValidate['rua']                    = 'required';
        $matrizValidate['bairro']                 = 'required';
        $matrizValidate['cidade']                 = 'required';
        $matrizValidate['uf']                     = 'required';
        $matrizValidate['tipo_proposta']          = 'required';


     

        if ($request->tipo_proposta == 'pessoa-fisica') {
           
            $matrizValidate['nome_mae']              = 'required';
            $matrizValidate['renda_mensal']          = 'required';
            $matrizValidate['renda_complementar']    = 'required';
            $matrizValidate['data_expedicao']        = 'required';
            $matrizValidate['rg']                    = 'required';
            $matrizValidate['cpf']                   = 'required';
            $matrizValidate['profissao']             = 'required';
            $matrizValidate['tempo_trabalho']        = 'required';

       
        }

        if ($request->tipo_conta != 'naotem') {
            $matrizValidate['tipo_conta']            = 'required';
            $matrizValidate['banco']                 = 'required';
            $matrizValidate['agencia']               = 'required';
            $matrizValidate['conta']                 = 'required';

            $customMessages['agencia.required']      = 'O campo agência é obrigatório.';
            $customMessages['tipo_conta.required']   = 'O campo tipo de conta é obrigatório.';
        }

        

        if ($request->tipo_proposta == 'pessoa-juridica') {
            $matrizValidate['nome_fantasia']        = 'required';
            $matrizValidate['razao_social']         = 'required';
            $matrizValidate['cnpj']                 = 'required';
            $matrizValidate['insc_estadual']        = 'required';
            $matrizValidate['capital_social']       = 'required';
            $matrizValidate['empresa_tipo']         = 'required';
            $matrizValidate['atividade']            = 'required';
            $matrizValidate['faturamento_medio']    = 'required';
            $matrizValidate['participacao']         = 'required';
        
        }

        $validator = Validator::make($request->all(), $matrizValidate, $customMessages );

        if ($request->tipo_proposta == 'pessoa-fisica') {

            $imgRGFrente                = Arquivo::where('tipo', 'rg-frente')->where('ref', $request->ref)->count();
            $imgRGVerso                 = Arquivo::where('tipo', 'rg-verso')->where('ref', $request->ref)->count();
            $imgComprovanteEndereco     = Arquivo::where('tipo', 'comprovante-endereco')->where('ref', $request->ref)->count();

            if ($imgRGFrente && $imgRGVerso && $imgComprovanteEndereco) {
                $arquivosEnviados = true;
            } else {
                $frmData['msg'] = 'Os arquivos de RG e comprovante de endereço são obrigatórios';
            }

        }

        if ($request->tipo_proposta == 'pessoa-juridica') {

            $imgContratoSocial          = Arquivo::where('tipo', 'contrato-social')->where('ref', $request->ref)->count();
            $imgCNPJ                    = Arquivo::where('tipo', 'cnpj')->where('ref', $request->ref)->count();

            if ($imgContratoSocial && $imgCNPJ ) {
                $arquivosEnviados = true;
            } else {
                $frmData['msg'] = 'Os arquivos de CNPJ e Contrato social são obrigatórios';
            }

        }

        if ($validator->fails()) {
            $frmData['errors'] = response()->json($validator->errors(), 200);
        }

        if ($validator->passes() && $arquivosEnviados) {

            //dd($request['cidade_contrato'] );

            $frmData['msg']         = 'Dados da propostas salvo com sucesso';
            $frmData['destino']     = 'reload';

            if ($request->tipo_proposta == 'pessoa-fisica') {
                $request['data_expedicao'] = dataSimples($request->data_expedicao, 'db');
            }

            $request['data_nascimento'] = dataSimples($request->data_nascimento, 'db');


            $request['valor_credito']                       = moeda($request->valor_credito, 'db');
            $request['taxa_administrativa']                 = moeda($request->taxa_administrativa, 'db');
            $request['valor_primeira_parcela']              = moeda($request->valor_primeira_parcela, 'db');
            $request['seguro']                              = moeda($request->seguro, 'db');
            $request['antecipacao_taxa_administrativa']     = moeda($request->antecipacao_taxa_administrativa, 'db');

            //echo $request['valor_credito']; exit;

            if(!isset($request->id)){
                $request['status'] = 'nova';
                $request['user_id'] = Auth::user()->id;
            }

            Proposta::updateOrCreate(['id' => $request->id], $request->all());
        }

        echo json_encode($frmData);

    }

    public function addAtributos($item, $tipo = '' ){

        $item->setAttribute('status_nome', $this->statusNome[$item['status']] );
        $item->setAttribute('status_cor', $this->statusCor[$item['status']] );
        $item->setAttribute('nome_tipo_proposta', $this->nomeTipoPessoa[$item['tipo_proposta']] );
        $item->setAttribute('genero_nome', $this->generoNome[$item['genero']] );


        
        if($tipo == 'tabela'){
        
            $item->setAttribute('ordem_proposta', $this->ordemProposta[$item['status']] );

            if($item->tipo_proposta == 'pessoa-fisica'){
                $item->setAttribute('full_nome', $item->nome );
            }
    
            if($item->tipo_proposta == 'pessoa-juridica'){
                $item->setAttribute('full_nome', "$item->nome ($item->nome_fantasia) " );
            }
        }

        return $item;

    }

    public function salvarStatus(Request $request){

        

        $matrizValidate = [
            'id'        => 'required',
            'status'    => 'required',
        ];


        $validator = Validator::make($request->all(), $matrizValidate);

        if ($validator->fails()) {
            $frmData['msg']         = 'erro';
        }

        if ($validator->passes()) {

            $frmData['msg']     = 'Status alterado com sucesso';
            $frmData['status']  = 1;

            Proposta::whereId($request->id)->update(['status' => $request->status]);

        }

        echo json_encode($frmData);

    }

    public function pagina($slug = '')
    {


        $destino = ($slug) ? 'site.artigo' : 'site.propostas';

        return view($destino);
    }

    public function destroy(Request $request)
    {
        $status = 1;


        $arquivo = new ArquivoController;

        $item       = Proposta::find($request->id);
        $ref        = $item->ref;
        $imagens    = Arquivo::where('ref', $ref)->pluck('arquivo');

        foreach ($imagens as $img) {
            $arquivo->excluir($img);
        }

        $item->delete();

        echo json_encode($status);
    }
}
