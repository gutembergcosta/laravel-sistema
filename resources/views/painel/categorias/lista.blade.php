@extends('layouts.painel')

@section('pagina')

    <div id="wrapper">
        @include('painel.blocos.topo')
        @include('painel.blocos.sidebar')
        
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row area-btn-novo">
                        <div class="col-md-12">
                            <a href="{{ route('admin.categoria-form', ['add']) }}" class="btn btn-success btn-xs"> 
                                <i class="fas fa-plus-circle"></i> Novo 
                            </a>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{ $tituloLista }}</h3>
                                </div>
                                <div class="panel-body">


                                    <div class="">
                                        <table class="table table-bordered tabela">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>

                                                    <th style="width: 80px"></th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach ($lista as $item)
                                                <tr>
                                                    <td><a class="tb_link" href="{{ route('admin.categoria-form', ['edit', $item['id']]) }}">{{ $item['nome'] }}</a> </td>
                                                    <td>
                                                        <a data-id="{{ $item['id'] }}" data-tipo="categoria" class="btn btn-danger btn-xs deletar">
                                                            Excluir
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        @include('painel.blocos.footer')
    </div>
@endsection

