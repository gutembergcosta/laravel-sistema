@extends('layouts.painel')

@section('pagina')

    <div id="wrapper">
        @include('painel.blocos.topo')
        @include('painel.blocos.sidebar')
        
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <style>
                        .panel-body h3{
                            color: #2e6da4;
                        }
                    </style>
                                    
                    <div class="row">
                        <form id="formulario" class="formulario" action="{{ url($actionForm)   }}" method="post">  

                            @csrf
                            
                            @isset($item['id']) <input type="hidden" name="id" value="{{ $item['id'] }}"> @endisset
                            <input type="hidden" name="ref" value="{{ $ref }}">
                            <input type="hidden" name="action" value="{{ $action }}">
                            <input type="hidden" name="tipo_proposta" value="{{ $tipoProposta }}">


                            <div class="col-md-9 area">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Formulário</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div id="msgz"></div>
                                        
                                        <div class="row">

                                            @if ($tipoProposta == 'pessoa-fisica')
                                                @include('painel.propostas.fields.dados-pessoa-fisica')
                                                @include('painel.propostas.fields.filiacao')
                                                @include('painel.propostas.fields.documentos-pessoa-fisica',['titulo' =>'Dados Pessoais'])
                                                @include('painel.propostas.fields.profissao')
                                                @include('painel.propostas.fields.endereco', ['titulo' =>'Endereço'] )
                                            @endif

                                            @if ($tipoProposta == 'pessoa-juridica')
                                                @include('painel.propostas.fields.dados-pessoa-juridica')
                                                @include('painel.propostas.fields.dados-pessoa-fisica',['titulo' =>'Dados do responsável pela empresa'])

                                                <div class="form-group col-md-4 wd-350">
                                                    <label>Porcentagem de participação no contrato:</label>
                                                    <input type="text" maxlength="3" onkeypress="return isNumberKey(event)" class="form-control wd-70" name="participacao" value="{{ $item['participacao']  ?? '' }}" required placeholder="%">
                                                </div>

                                                @include('painel.propostas.fields.endereco', ['titulo' =>'Endereço comercial'] )
                                            @endif

                                            @include('painel.propostas.fields.dados-bancarios')

                                            @if (Auth::user()->userDados->tipo == 'admin')
                                                @if ($item['status'] != 'nova' )
                                                    @include('painel.propostas.fields.dados-plano')
                                                @endif
                                            @endif

                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 side-area">

                                @if ($tipoProposta == 'pessoa-fisica')
                                    @component('painel.blocos.upload-destaque', $blocosImg['dataImgRGFrente'])@endcomponent
                                    @component('painel.blocos.upload-destaque', $blocosImg['dataImgRGVerso'])@endcomponent
                                    @component('painel.blocos.upload-destaque', $blocosImg['dataImgCompEndereco'])@endcomponent
                                @endif

                                @if ($tipoProposta == 'pessoa-juridica')
                                    @component('painel.blocos.upload-destaque', $blocosImg['dataImgContratoSocial'])@endcomponent
                                    @component('painel.blocos.upload-destaque', $blocosImg['dataImgCNPJ'])@endcomponent
                                @endif

                                

                            </div>

                        </form>

                        <script>


                            $(document).ready(function () {

                                $("#formulario").submit(function (e) {
                                    e.preventDefault();

                                    var data = $(this).serializeArray();

                                    $(this).find('[type=submit]').attr('disabled', 'disabled');
                                    enviaForm(data, $(this).attr('action'));
                                    $(this).find('[type=submit]').removeAttr('disabled');

                                });

                                
                            });

                        </script>

                  
                    </div>

                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        @include('painel.blocos.footer')
    </div>
@endsection

