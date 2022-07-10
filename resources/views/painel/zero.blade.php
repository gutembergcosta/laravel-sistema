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
                        <div class="col-md-12">

                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Página</h3>
                                </div>
                                <div class="panel-body">

                                    <div id="msgz"></div>

                                    


                                    @php
                                        //@include('view.name', ['status' => 'complete'])
                                        //@includeWhen($boolean, 'view.name', ['status' => 'complete'])

                                        
                                        $isActive = false;
                                        $hasError = true;
                                    @endphp
                                    
                                    <p @class(
                                        'p-4','xxx'
                                        
                                    )>testes</p>

                                    @if (count($lista) > 1)
                                        <p>existem {{ count($lista) }} registros </p>
                                    @else
                                        <p> Lista vazia</p>
                                    @endif

                                    <p>{{ $texto }}</p>

                                    @foreach ($lista as $item)
                                        <p>This is user {{ $item[0] }}</p>
                                    @endforeach

                                    @forelse ($lista02 as $item)
                                        <p>This is user {{ $item[0] }}</p>
                                    @empty
                                        <p>vazio</p>
                                    @endforelse

                                    @switch($numero)
                                        @case(1)
                                            <p> case {{$numero}}</p>
                                            @break
                                    
                                        @case(2)
                                            <p> case {{$numero}}</p>
                                            @break
                                    
                                        @default
                                            <p> default {{$numero}}</p>
                                    @endswitch

                                    @unless ($numero == 1)
                                        <p> Não logado</p>
                                    @endunless

                                    @isset($numero)
                                        <p>Existe</p>
                                    @endisset
                                    
                                    @empty($records)
                                        <p>testa se existe e é vazio</p>
                                    @endempty



                                    

                                    
                                </div>
                            </div>
                        </div>



                        <script>
                            $(document).ready(function () {

                                $("#formulario").submit(function (e) {
                                    e.preventDefault();

                                    var data = $('#formulario').serializeArray();
                                    data.push({ name: "texto", value: tinymce.get('texto').getContent() });

                                    $.ajax({
                                        url: "http://localhost/painel03/Textos/salvar",
                                        type:'POST',
                                        dataType: "json",
                                        data: data,
                                        success: function(data) {
                                            
                                            if (data['status'] == 0) {
                                                alert('Item salvo com sucesso!');
                                                //window.location.href = data['destino'];
                                                location.reload();
                                            }

                                            if (data['status'] > 0){
                                                $("#msgz").text('').html(data['msg']);
                                                alert('Erro');
                                                gotop();
                                            }
                                        }
                                    });

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

