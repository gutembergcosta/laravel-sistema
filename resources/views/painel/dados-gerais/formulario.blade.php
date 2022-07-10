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
                        <form id="formulario" class="formulario" action="{{ url($actionForm) }}" method="post">  

                            @csrf

                            <div class="col-md-9 area">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Contatos</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div id="msgz"></div>
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <h4>Telefones</h4>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Telefone 01:</label>
                                                <input type="text" class="form-control" name="tel01" value="{{ $item['tel01']  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Telefone 02:</label>
                                                <input type="text" class="form-control" name="tel02" value="{{ $item['tel02']  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Telefone 03:</label>
                                                <input type="text" class="form-control" name="tel03" value="{{ $item['tel03']  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Whatsapp:</label>
                                                <input type="text" class="form-control" name="zap" value="{{ $item['tel03']  ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-12">
                                                <h4>Redes sociais</h4>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Instagram:</label>
                                                <input type="text" class="form-control" name="instagram" value="{{ $item['instagram']  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Facebook:</label>
                                                <input type="text" class="form-control" name="facebook" value="{{ $item['facebook']  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Linkedin:</label>
                                                <input type="text" class="form-control" name="linkedin" value="{{ $item['linkedin']  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="email" value="{{ $item['email']  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Vídeo Faq:</label>
                                                <input type="text" class="form-control" name="url_video_faq" value="{{ $item['url_video_faq']  ?? '' }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Textos de apresentação</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div id="msgz"></div>
                                        
                                        <div class="row">

                                            <div class="form-group col-md-12">
                                                <label>Apresentação do site:</label>
                                                <textarea id="intro_site" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['intro_site']  ?? '' }}</textarea>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Planos:</label>
                                                <textarea id="intro_planos" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['intro_planos']  ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Contemplados:</label>
                                                <textarea id="intro_contemplados" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['intro_contemplados']  ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Representantes:</label>
                                                <textarea id="intro_representantes" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['intro_representantes']  ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Contato:</label>
                                                <textarea id="intro_contato" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['intro_contato']  ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Cadastro:</label>
                                                <textarea id="intro_cadastro" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['intro_cadastro']  ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Endereço em linha:</label>
                                                <input type="text" class="form-control" name="endereco" value="{{ $item['endereco']  ?? '' }}">
                                            </div>

                                            

                                            <div class="form-group col-md-12">
                                                <label>Endereço completo:</label>
                                                <textarea name="endereco_full" class="form-control" placeholder="textarea" rows="6"  >{{ $item['endereco_full']  ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Textos</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div id="msgz"></div>
                                        
                                        <div class="row">
                                          

                                            <div class="form-group col-md-12">
                                                <label>Institucional:</label>
                                                <textarea id="institucional" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['institucional']  ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Perguntas frequentes:</label>
                                                <textarea id="faq" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['faq']  ?? '' }}</textarea>
                                            </div>


                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Textos</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div id="msgz"></div>
                                        
                                        <div class="row">
                                          
                                            <div class="form-group col-md-12">
                                                <label>Contrato:</label>
                                                <textarea id="txt_contrato" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['txt_contrato']  ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                @component('painel.blocos.upload-galeria', $dataGaleria)
                                    <p>Dimensôes recomendadas: <br>2000x800px</p>
                                @endcomponent

                                @component('painel.blocos.upload-galeria', $dataMarcas)
                                    <p>Dimensôes recomendadas: <br>500x500px</p>
                                @endcomponent
                                
              
                            </div>


                            <div class="col-md-3 side-area">
                                @component('painel.blocos.upload-destaque', $dataImgDestaque)
                                    <p>Dimensôes recomendadas: 900x450px</p>
                                @endcomponent

                                @component('painel.blocos.upload-destaque', $dataImgInstitucional)
                                    <p>Dimensôes recomendadas: 900x450px</p>
                                @endcomponent
                            </div>

                        </form>

                        <script>

                            $(document).ready(function () {

                                $("#formulario").submit(function (e) {
                                    e.preventDefault();

                                    var data = $(this).serializeArray();
                                    data.push({ name: "institucional", value: tinymce.get('institucional').getContent() });
                                    data.push({ name: "intro_site", value: tinymce.get('intro_site').getContent() });
                                    data.push({ name: "intro_planos", value: tinymce.get('intro_planos').getContent() });
                                    data.push({ name: "intro_contemplados", value: tinymce.get('intro_contemplados').getContent() });
                                    data.push({ name: "intro_representantes", value: tinymce.get('intro_representantes').getContent() });
                                    data.push({ name: "intro_contato", value: tinymce.get('intro_contato').getContent() });
                                    data.push({ name: "intro_cadastro", value: tinymce.get('intro_cadastro').getContent() });
                                    data.push({ name: "faq", value: tinymce.get('faq').getContent() });
                                    data.push({ name: "txt_contrato", value: tinymce.get('txt_contrato').getContent() });

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

