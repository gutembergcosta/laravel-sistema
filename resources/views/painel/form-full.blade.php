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
                        <form id="formulario" class="formulario" action="" method="post">  

                            <div class="col-md-9 area">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{titulo-formulario}</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div id="msgz"></div>

                                        <input type="hidden" name="token" value="{token}" >
                                        <input type="hidden" name="action" value="{action}" >
                                        
                                        <div class='row'>
                                            <div class="form-group col-md-6  wd-300">
                                                <label>Nome:</label>
                                                <input type="text" class="form-control" name='nome' value='{nomeItem}'>
                                            </div>

                                            <div class="form-group col-md-3 wd-200">
                                                <label>Categorias:</label>
                                                <select class="form-control" name='categoria'>

                                                    <option value=""></option>
                                                    {categoriasItem}
                                                        <option value="{id}" {selected} >{nome}</option>
                                                    {/categoriasItem}

                                                </select>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Texto:</label>
                                                <textarea id="texto" class="form-control editorx" placeholder="textarea" rows="12"  >{texto}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Número:</label>
                                            <input type="text" class="form-control" onkeypress="return isNumberKey(event)"
                                                placeholder="text field">
                                        </div>

                                        <div class="form-group">
                                            <label>Moeda:</label>
                                            <input type="text" class="form-control money" placeholder="text field">
                                        </div>

                                        <div class="form-group">
                                            <label>CPF:</label>
                                            <input type="text" class="form-control cpf" placeholder="text field">
                                        </div>

                                        <div class="form-group">
                                            <label>Date Picker:</label>
                                            <input type="text" class="form-control datepicker-here" data-language='pt-BR'
                                                data-position="bottom left">
                                        </div>

                                        <div class="form-group">
                                            <label>Item:</label>
                                            <input type="password" class="form-control" value="asecret">
                                        </div>

                                        <div class="form-group">
                                            <label>Item:</label>
                                            <textarea class="form-control" placeholder="textarea" rows="4"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Txto 01:</label>
                                            <textarea id="" class="form-control sample01" placeholder="textarea"
                                                rows="12"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Txto 01:</label>
                                            <textarea id="" class="form-control sample01" placeholder="textarea"
                                                rows="12"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Txto 02:</label>
                                            <textarea id="" class="form-control editorx" placeholder="textarea"
                                                rows="12"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Item:</label>
                                            <select class="form-control">
                                                <option value="cheese">Cheese</option>
                                                <option value="tomatoes">Tomatoes</option>
                                                <option value="mozarella">Mozzarella</option>
                                                <option value="mushrooms">Mushrooms</option>
                                                <option value="pepperoni">Pepperoni</option>
                                                <option value="onions">Onions</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Select 2:</label>
                                            <select class="form-control js-example-basic-single">
                                                <option value="cheese">Cheese</option>
                                                <option value="tomatoes">Tomatoes</option>
                                                <option value="mozarella">Mozzarella</option>
                                                <option value="mushrooms">Mushrooms</option>
                                                <option value="pepperoni">Pepperoni</option>
                                                <option value="onions">Onions</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Select 2:</label>
                                            <select class="form-control js-example-basic-multiple" name="states[]"
                                                multiple="multiple">
                                                <option value="cheese">Cheese</option>
                                                <option value="tomatoes">Tomatoes</option>
                                                <option value="mozarella">Mozzarella</option>
                                                <option value="mushrooms">Mushrooms</option>
                                                <option value="pepperoni">Pepperoni</option>
                                                <option value="onions">Onions</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Item:</label>
                                            <label class="fancy-checkbox">
                                                <input type="checkbox">
                                                <span>Fancy Checkbox 1</span>
                                            </label>
                                            <label class="fancy-checkbox">
                                                <input type="checkbox">
                                                <span>Fancy Checkbox 2</span>
                                            </label>
                                            <label class="fancy-checkbox">
                                                <input type="checkbox">
                                                <span>Fancy Checkbox 3</span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>Item:</label>
                                            <label class="fancy-radio">
                                                <input name="gender" value="male" type="radio">
                                                <span><i></i>Male</span>
                                            </label>
                                            <label class="fancy-radio">
                                                <input name="gender" value="female" type="radio">
                                                <span><i></i>Female</span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>Switch:</label>
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>

                                        <button type="button" class="btn btn-default">Default</button>
                                        <button type="button" class="btn btn-primary">Primary</button>
                                        <button type="button" class="btn btn-info">Info</button>
                                        <button type="button" class="btn btn-success">Success</button>
                                        <button type="button" class="btn btn-warning">Warning</button>
                                        <button type="button" class="btn btn-danger">Danger</button>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3 side-area">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Imagem Destaque </h3>
                                    </div>
                                    <div class="panel-body" id="hg-01">

                                        <p>Dimensôes recomendadas: <br>900x450px</p>

                                        <div id="img-destaque-01"><div class="ajax-file-upload" style="position: relative; overflow: hidden; cursor: default;">Upload<form method="POST" action="http://localhost/painel03/Arquivos/upload" enctype="multipart/form-data" style="margin: 0px; padding: 0px;"><input type="file" id="ajax-upload-id-1643570856127" name="myfile" accept="jpg,jpeg,png" style="position: absolute; cursor: pointer; top: 0px; width: 100%; height: 100%; left: 0px; z-index: 100; opacity: 0;"></form></div><div></div></div><div class="ajax-file-upload-container"></div>


                                        <div class="row">
                                            <div class="col-md-12 _item" style="display: none;">
                                                <div>
                                                    <a class="link-img" data-fancybox="gallery" href="http://localhost/painel03/uploads/max-">
                                                        <img class="total" src="">
                                                    </a>
                                                </div>
                                                <div>
                                                    <a class="remover-arquivo" data-tipo="box" data-item="">Remover</a>
                                                </div>
                                            </div>
                                        </div>


                                                                            
                                        <script>
                                            $(document).ready(function() {
                                                $("#img-destaque-01").uploadFile({
                                                    url:"http://localhost/painel03/Arquivos/upload",
                                                    multiple:false,
                                                    dragDrop:false,
                                                    acceptFiles:"jpg,jpeg,png",
                                                    fileName:"myfile",
                                                    returnType:"json",
                                                    formData: {
                                                        "vrf": "5iqvx61f6e6a717ac9",
                                                        "tipo": "destaque",
                                                        "unico": 1
                                                    },
                                                    onSuccess:function(files,data,xhr,pd)
                                                    {

                                                        let box = '#hg-01';

                                                        
                                                        $(box).find('.link-img').attr('href', `${data['base_url']}uploads/max-${data['img']}`);
                                                        $(box).find('img').attr('src', `${data['base_url']}uploads/square-${data['img']}`);
                                                        $(box).find('.remover-arquivo').attr('data-item', `${data['img']}`);

                                                        $(box).find('._item').fadeIn(300);

                                                    
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
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Imagem Destaque </h3>
                                    </div>
                                    <div class="panel-body" id="hg-01">

                                        <p>Dimensôes recomendadas: <br>900x450px</p>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <button id="abrir-modal" type="button" class="btn btn-success">Alterar senha</button>
                                            </div>
                                        </div>

                                        <script>
                                            $(document).ready(function () {
                
                                                $("#abrir-modal").click(function (e) {
                
                                                    $("#modal-item .modal-body").text('Aguarde');
                
                                                    $.ajax({
                                                        url: "http://laravel.teste/admin/formulario/basico",
                                                        type:'POST',
                                                        dataType: "html",
                                                        async: false,
                                                        data: {
                                                            tkn: 'wu6qm611b1313b1e6b'
                                                        },
                                                        success: function(data) {
                
                                                            $("#modal-item .modal-body").text('').html(data);
                                                           
                                                        }
                                                    });
                
                                                    $("#modal-item").modal();
                                                });
                                            });
                
                                        </script>

                                    </div>
                                </div>
                            </div>

                        </form>

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
        @include('painel.blocos.modais')
    </div>
@endsection

