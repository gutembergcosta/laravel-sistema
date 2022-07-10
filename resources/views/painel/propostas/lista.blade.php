@extends('layouts.painel')

@section('pagina')

    <div id="wrapper">
        @include('painel.blocos.topo')
        @include('painel.blocos.sidebar')
        
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    @if ($tipoUser == 'user')
                        @include('painel.propostas.includes.botoes-add')
                    @endif

                    <div class="row">
                        <div class="col-md-12">

                            @if ($tipoUser == 'admin')
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Propostas Pendentes</h3>
                                    </div>
                                    <div class="panel-body">
                
                                        @include('painel.propostas.tabelas.lista-admin', ['listaProposta' => $lista->where('status','nova'), 'titulo' => 'Novas propostas'] )
                                        @include('painel.propostas.tabelas.lista-admin', ['listaProposta' => $lista->where('status','analise'), 'titulo' => 'Propostas em análise'] )
                                        @include('painel.propostas.tabelas.lista-admin', ['listaProposta' => $lista->where('status','aprovada'), 'titulo' => 'Propostas aprovadas'] )
                                        @include('painel.propostas.tabelas.lista-admin', ['listaProposta' => $lista->where('status','recusada'), 'titulo' => 'Propostas recusadas'] )
                                        
                                    </div>
                                </div>
                            @endif

                            @if ($tipoUser == 'user')
                                @include('painel.propostas.tabelas.lista-user')
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        @include('painel.blocos.footer')
    </div>
@endsection

