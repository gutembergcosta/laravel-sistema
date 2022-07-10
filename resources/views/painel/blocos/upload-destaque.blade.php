@php
    $thumb = (isset($thumb))? $thumb  :'thumb';
@endphp

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $titulo }} </h3>
    </div>
    <div class="panel-body" id="hg-{{ $tipo }}">

        {{ $slot }}

        <div id="img-destaque-{{ $tipo }}">Upload</div>

    

        <div class="row">
            <div class="col-md-12 _item" style="{{ ($img) ? '' : 'display: none' }}">
                <div>
                    <a class="link-img" data-fancybox="destaque" href="@if($img){{ url('/public/uploads/max-'.$img['arquivo']) }}@endif">
                        <img class="total" src="@if($img){{ url('/public/uploads/'.$thumb.'-'.$img['arquivo']) }}@endif">
                    </a>
                </div>
                <div>
                    <a class="remover-arquivo" data-tipo="box" data-item="@if($img){{$img['arquivo']}}@endif">Remover</a>
                </div>
            </div>
        </div>


                                            
        <script>
            $(document).ready(function() {
                $("#img-destaque-{{ $tipo }}").uploadFile({
                    url:"{{ route('arquivo.upload') }}",
                    multiple:false,
                    dragDrop:false,
                    acceptFiles:".pdf,.jpeg,.png",
                    fileName:"myfile",
                    returnType:"json",
                    formData: {
                        "_token": "{{ csrf_token() }}",
                        "ref": "{{ $ref }}",
                        "tipo": "{{ $tipo }}",
                        "unico": true
                    },
                    onSuccess:function(files,data,xhr,pd)
                    {

                        let box = '#hg-{{ $tipo }}';

                        
                        $(box).find('.link-img').attr('href', `${data['max']}`);
                        $(box).find('img').attr('src', `${data['miniatura']}`);
                        $(box).find('.remover-arquivo').attr('data-item', `${data['arquivo']}`);

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