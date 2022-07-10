@php

    $thumb = (isset($thumb))?:'thumb';

@endphp
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $titulo }} </h3>
    </div>
    <div class="panel-body">

            {{ $slot }}

        <div class="total left">

            <div id="fileuploader-{{ $tipo }}">Upload</div>

            <div class=" hayagal">

                <div class="row" id="galeria-{{ $tipo }}">
                    @if($galeria)
                        @foreach ($galeria as $img)
                            <div class="col-xs-6 col-md-3 _item">
                                <div>
                                    <a class="link-img" data-fancybox="gallery" href="{{$img['arquivo']}}">
                                        <img class="total" src="{{ url('/public/uploads/'.$thumb.'-'.$img['arquivo']) }}">
                                    </a>
                                </div>
                                <div>
                                    <a class="remover-arquivo" data-item="{{$img['arquivo']}}">Remover</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>

        </div>
                                            
        <script>

            $(document).ready(function() {
                $("#fileuploader-{{ $tipo }}").uploadFile({
                    url:"{{ route('arquivo.upload') }}",
                    multiple:true,
                    dragDrop:true,
                    maxFileCount:20,
                    acceptFiles:".jpg,.jpeg,.png",
                    fileName:"myfile",
                    returnType:"json",
                    formData: {
                        "_token": "{{ csrf_token() }}",
                        "ref": "{{ $ref }}",
                        "tipo": "{{ $tipo }}",
                        "unico": false
                    },
                    onSuccess:function(files,data,xhr,pd)
                    {

                        let template = $("#box-galeria-01").clone().removeAttr('id').removeClass('hide');

                        template.find('.link-img').attr('href', `${data['max']}`);
                        template.find('img').attr('src', `${data['miniatura']}`);
                        template.find('.remover-arquivo').attr('data-item', `${data['arquivo']}`);

                        template.find('._item').fadeIn(300);

                        

                        $("#galeria-{{ $tipo }}").append(template);
                    
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