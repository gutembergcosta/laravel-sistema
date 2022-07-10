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
                        <form id="formulario" class="formulario" action="{{ url($actionForm)   }}" method="post">  

                            @csrf
                            
                            @isset($item['id']) <input type="hidden" name="id" value="{{ $item['id'] }}"> @endisset
                            <input type="hidden" name="ref" value="{{ $ref }}">
                            <input type="hidden" name="action" value="{{ $action }}">
                            <input type="hidden" name="senha" value="{{ $item['senha']  ?? '' }}">


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
                                                <input type="text" class="form-control" name="nome" value="{{ $item['nome']  ?? '' }}">
                                            </div>
                                    
                                            <div class="form-group col-md-5">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="email" value="{{ $item['email']  ?? '' }}">
                                            </div>
                                    
                                            <div class="form-group col-md-4">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="email" value="{{ $item['email']  ?? '' }}">
                                            </div>
                                    
                                            <div class="form-group col-md-4">
                                                <label>Telefone:</label>
                                                <input type="text" class="form-control" name="telefone" value="{{ $item['telefone']  ?? '' }}">
                                            </div>
                                    
                                            <div class="form-group col-md-7">
                                                <label>Endereco:</label>
                                                <input type="text" class="form-control" name="endereco" value="{{ $item['endereco']  ?? '' }}">
                                            </div>
                                    
                                            <div class="form-group col-md-2">
                                                <label>Número:</label>
                                                <input type="text" class="form-control" name="numero" value="{{ $item['numero']  ?? '' }}">
                                            </div>
                                    
                                            <div class="form-group col-md-3">
                                                <label>Complemento:</label>
                                                <input type="text" class="form-control" name="complemento" value="{{ $item['complemento']  ?? '' }}">
                                            </div>
                                    
                                            <div class="form-group col-md-5">
                                                <label>Bairro:</label>
                                                <input type="text" class="form-control" name="bairro" value="{{ $item['bairro']  ?? '' }}">
                                            </div>
                                    
                                            <div class="form-group col-md-5">
                                                <label>Cidade:</label>
                                                <input type="text" class="form-control" name="cidade" value="{{ $item['cidade']  ?? '' }}">
                                            </div>
                                                                        
                                            <div class="form-group col-md-3 wd-200">
                                                <label>UF:</label>
                                                <select class="form-control seletor-simples" name='uf' data-select="{{ $item['uf']  ?? '' }}">
                                    
                                                    <option value=""></option>
                                                    <option value="AC">Acre</option>
                                                    <option value="AL">Alagoas</option>
                                                    <option value="AP">Amapá</option>
                                                    <option value="AM">Amazonas</option>
                                                    <option value="BA">Bahia</option>
                                                    <option value="CE">Ceará</option>
                                                    <option value="DF">Distrito Federal</option>
                                                    <option value="ES">Espirito Santo</option>
                                                    <option value="GO">Goiás</option>
                                                    <option value="MA">Maranhão</option>
                                                    <option value="MS">Mato Grosso do Sul</option>
                                                    <option value="MT">Mato Grosso</option>
                                                    <option value="MG">Minas Gerais</option>
                                                    <option value="PA">Pará</option>
                                                    <option value="PB">Paraíba</option>
                                                    <option value="PR">Paraná</option>
                                                    <option value="PE">Pernambuco</option>
                                                    <option value="PI">Piauí</option>
                                                    <option value="RJ">Rio de Janeiro</option>
                                                    <option value="RN">Rio Grande do Norte</option>
                                                    <option value="RS">Rio Grande do Sul</option>
                                                    <option value="RO">Rondônia</option>
                                                    <option value="RR">Roraima</option>
                                                    <option value="SC">Santa Catarina</option>
                                                    <option value="SP">São Paulo</option>
                                                    <option value="SE">Sergipe</option>
                                                    <option value="TO">Tocantins</option>
                                    
                                                </select>

                                                
                                            </div>
                                    
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Aprovar cadastro</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 side-area">
                                @include('painel.cadastros.box-aprovacao',$item)
                            </div>

                        </form>

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

