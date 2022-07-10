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
                        <form id="formulario" class="formulario" action="{{ url('salvar-artigo') }}" method="post">  

                            @csrf
                            <input type="hidden" name="action" value="insert">
                            <input type="hidden" name="ref" value="{{$ref}}">


                            <div class="col-md-9 area">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Página</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div id="msgz"></div>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label>Nome:</label>
                                                <input type="text" class="form-control" name="nome" value="">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Texto:</label>
                                                <textarea id="texto" class="form-control editorx" placeholder="textarea" rows="12"  ></textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

          
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Uploads </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div id="fileuploader">Upload</div>

                                        <div class=" hayagal">

                                            <div class="row" id="galeria-01">
                                                {galeria}
                                                    <div class="col-md-3 _item">
                                                        <div>
                                                            <a class="link-img" data-fancybox="gallery" href="">
                                                                <img class="total" src="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="remover-arquivo" data-item="{nome}">Remover</a>
                                                        </div>
                                                    </div>
                                                {/galeria}
                                            </div>

                                        </div>

                                                                            
                                        <script>
                                            $(document).ready(function() {
                                                $("#fileuploader").uploadFile({
                                                    url:"{base_url}Arquivos/upload",
                                                    multiple:true,
                                                    dragDrop:true,
                                                    maxFileCount:20,
                                                    acceptFiles:"jpg,jpeg,png",
                                                    fileName:"myfile",
                                                    returnType:"json",
                                                    formData: {
                                                        "vrf": "{token}",
                                                        "tipo": "{tipo-galeria}",
                                                    },
                                                    onSuccess:function(files,data,xhr,pd)
                                                    {

                                                        let template = $("#box-galeria-01").clone().removeAttr('id').removeClass('hide');

                                                        template.find('.link-img').attr('href', `${data['base_url']}uploads/max-${data['img']}`);
                                                        template.find('img').attr('src', `${data['base_url']}uploads/square-${data['img']}`);
                                                        template.find('.remover-arquivo').attr('data-item', `${data['img']}`);

                                                        $("#galeria-01").append(template);
                                                    
                                                    },
                                                    afterUploadAll:function(obj)
                                                    {
                                                        $(".ajax-file-upload-container").html('');
                                                    },
                                                    
                                                });
                                            });
                                        </script>

                                    </div>
                                </div>
              
                            </div>


                            <div class="col-md-3 side-area">
                                @component('painel.blocos.upload_destaque',['ref' => $ref, 'tipo' => 'destaque', 'titulo' => 'Imagem Destaque' ])
                                    <p>Dimensôes recomendadas: <br>900x450px</p>
                                @endcomponent
                            </div>

                        </form>

                        <script>


                            $(document).ready(function () {

                                $("#formulario").submit(function (e) {
                                    e.preventDefault();

                                    var data = $(this).serializeArray();
                                    data.push({ name: "texto", value: tinymce.get('texto').getContent() });

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

