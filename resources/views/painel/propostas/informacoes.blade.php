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
                        .dados-info{ margin: 20px 0 0 10px }
                        .dados-info li{ margin-bottom: 7px }
                    </style>
                                    
                    <div class="row">

                        <div class="col-md-8">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informações da proposta <span class="label label-{{ $item['status_cor'] }}"> {{ $item['status_nome'] }} </span></h3>
                                </div>
                                <div class="panel-body">
                                    {{-- @include('painel.propostas.includes.infos-'.$tipoProposta) --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('painel.propostas.infos.dados-'.$tipoProposta,$item)
                                            @include('painel.propostas.infos.documentos',$item)
                                            @include('painel.propostas.infos.filiacao',$item)
                                            @include('painel.propostas.infos.endereco',$item)
                                            @if ($tipoProposta != 'pessoa-fisica' )
                                                @include('painel.propostas.infos.profissao',$item)
                                            @endif
                                            @include('painel.propostas.infos.data-banco',$item)
                                    
                                            @if ($item['status'] != 'aprovada' )
                                                @include('painel.propostas.infos.data-plano',$item)
                                            @endif
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Informações do representante</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                      
                                            <ul class="dados-info">
                                                <li>
                                                    <strong>Nome:</strong> {{ $representante->userDados->nome}}
                                                </li>
                                                <li>
                                                    <strong>Email:</strong> {{ $representante->email}}
                                                </li>
                                                <li >
                                                    <strong>Whatsapp:</strong> <a target="_blank" href="https://api.whatsapp.com/send?phone=55{{ numeros($representante->userDados->telefone) }} &amp;text=Olá {{ $representante->userDados->nome }}, Tudo bem? Gostaria de conversar sobre a proposta de consórcio do *{{ $item->nome }}*" > <i class="fab fa-whatsapp"></i> {{$representante->userDados->telefone}}  </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            @include('painel.propostas.includes.box-aprovar-proposta',$item)
                            @include('painel.propostas.includes.box-gera-pdf',$item)

                            @if ($tipoProposta == 'pessoa-fisica')
                                @component('painel.propostas.includes.box-doc', $blocosImg['dataImgRGFrente'])@endcomponent
                                @component('painel.propostas.includes.box-doc', $blocosImg['dataImgRGVerso'])@endcomponent
                                @component('painel.propostas.includes.box-doc', $blocosImg['dataImgCompEndereco'])@endcomponent
                            @endif

                            @if ($tipoProposta == 'pessoa-juridica')
                                @component('painel.propostas.includes.box-doc', $blocosImg['dataImgContratoSocial'])@endcomponent
                                @component('painel.propostas.includes.box-doc', $blocosImg['dataImgCNPJ'])@endcomponent
                            @endif

                        </div>

                        <script>
                            $(document).ready(function () {
                                $("#formulario").submit(function (e) {
                                    e.preventDefault();
                                    var data = $(this).serializeArray();
                                    enviaForm(data, $(this).attr('action'));
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

