
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Imprimir documentos</h3>
    </div>
    <div class="panel-body" >

        <div class="row">
            <div class="col-md-12" style="margin-bottom: 12px">
                <a href="{{ route('admin.proposta-form', ['edit', $item->id]) }}" class="btn btn-info">Editar proposta</a>
            </div>
            <div class="col-md-12" style="margin-bottom: 12px">
                <button id="imprimir-proposta" data-link="{{ route('admin.imprimir-proposta', [$item->id]) }}" class="btn btn-info">Imprimir proposta</button>
            </div>
            <div class="col-md-12 hide" style="margin-bottom: 12px">
                <button id="exportar-pdf" data-id="{{$item['id']}}" type="button" class="btn btn-info">Exportar PDF</button>
            </div>
        </div>

    </div>
</div>

<script>
    $("#imprimir-proposta").click(function (e) {
     
        let link = $(this).data('link')
        
        $("#modal-iframe").find('iframe').attr('src', '').attr('src', link);
        $('#modal-iframe').modal('show'); 
    });
</script>

<div id="modal-iframe" class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Imprimir</h4>
            </div>
            <div class="modal-body" style="height: 400px">
                <iframe src="" frameborder="0" style="width: 100%; height: 100%" ></iframe>
            </div>
           
        </div><!-- /.modal-content -->
       
    </div>
</div>