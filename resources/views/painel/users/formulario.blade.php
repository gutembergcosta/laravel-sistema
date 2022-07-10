@extends('layouts.painel')

@section('pagina')

    <div id="wrapper">
        @include('painel.blocos.topo')
        @include('painel.blocos.sidebar')
        
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                                    
                    <div class="row">
                        <form id="formulario" class="formulario" action="{{ url($actionForm)  }}" method="post">  

                            @csrf
                            
                            @isset($item->id) <input type="hidden" name="id" value="{{ $item->id }}"> @endisset
                            <input type="hidden" name="ref" value="{{ $ref }}">


                            <div class="col-md-9 area">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Formulário</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div id="msgz"></div>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-7">
                                                <label>Nome:</label>
                                                <input type="text" class="form-control" name="nome" value="{{ $item->UserDados->nome  ?? '' }}" required>
                                            </div>

                                            <div class="form-group col-md-5">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="email" value="{{ $item->email  ?? '' }}" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Telefone:</label>
                                                <input type="text" class="form-control" name="telefone" value="{{ $item->UserDados->telefone  ?? '' }}" required>
                                            </div>

                                            <div class="quebra" ></div>

                                            <div class="form-group col-md-8">
                                                <label>Endereço:</label>
                                                <input type="text" class="form-control" name="endereco" value="{{ $item->UserDados->endereco  ?? '' }}" required>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Número:</label>
                                                <input type="text" class="form-control" name="numero" value="{{ $item->UserDados->numero  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Complemento:</label>
                                                <input type="text" class="form-control" name="complemento" value="{{ $item->UserDados->complemento  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Bairro:</label>
                                                <input type="text" class="form-control" name="bairro" value="{{ $item->UserDados->bairro  ?? '' }}" required >
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Cidade:</label>
                                                <input type="text" class="form-control" name="cidade" value="{{ $item->UserDados->cidade  ?? '' }}" required >
                                            </div>

                                            <div class="form-group col-md-2 wd-200">
                                                <label>UF:</label>
                                                <input type="text" class="form-control" name="uf" value="{{ $item->UserDados->uf  ?? '' }}" required >
                                            </div>

                                   
                                       
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
              
                            </div>

                            <div class="col-md-3 side-area">
                                @component('painel.users.box-extras', ['item' => $item])
                                    <p>Dimensôes recomendadas: <br>900x450px</p>
                                @endcomponent
                            </div> 


                            

                        </form>

                        

                  
                    </div>

                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        @include('painel.blocos.footer')

        <div id="modal-senha" class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document" style="max-width: 500px">
                <div class="modal-content">
                    <form id="formulario02" class="formulario" action="{{ url($actionFormSenha)  }}" method="post">  

                        @csrf
                        <input type="hidden" name="user_id" value="">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Salvar nova senha</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nova senha:</label>
                                    <input type="password" class="form-control" name="novaSenha01" required >
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Confirmar:</label>
                                    <input type="password" class="form-control" name="novaSenha02" required >
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


    <script>


        $(document).ready(function () {

            $("form").submit(function (e) {
                e.preventDefault();

                var data = $(this).serializeArray();

                enviaForm(data, $(this).attr('action'));

            });
            
        });

    </script>
@endsection

