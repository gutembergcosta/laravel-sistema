
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Aprovar proposta</h3>
    </div>
    <div class="panel-body" >

        <div class="row">
            @if ($item['status'] != 'aprovada' )
                <div class="col-md-12" style="margin-bottom: 12px">
                    <button data-status="aprovada" data-id="{{$item['id']}}" type="button" class="btn btn-success marcar">Aprovar</button>
                </div>
            @endif

            @if ($item['status'] != 'recusada' )
                <div class="col-md-12" style="margin-bottom: 12px">
                    <button data-status="recusada" data-id="{{$item['id']}}" type="button" class="btn btn-danger">Recusar</button>
                </div>
            @endif

            @if ($item['status'] != 'analise' )
                <div class="col-md-12" style="margin-bottom: 12px">
                    <button data-status="analise" data-id="{{$item['id']}}" type="button" class="btn btn-warning marcar">Em análise</button>
                </div>
            @endif
        </div>

        


                                            
        <script>
            $(document).ready(function () {
                $("[data-status]").click(function (e) {

                    if (confirm("Deseja alterar o status desta proposta?") == true) {
            
                        let excluido = 0;

                        $.ajax({
                            url: "{{ url('admin/status-proposta') }}",
                            dataType: "json",
                            async:false,
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'status': $(this).data('status'),                                       
                                'id': $(this).data('id'),                                       
                            },
                            success: function (data) 
                            {
                                console.log('data: ' +data);
                                if(data.status == 1){
                                    alert(data.msg);

                                    location.reload();
                                }else{
                                    alert("Erro");
                                }
                                
                            },
                            error: function ()
                            {
                                alert("Erro");
                            }
                        });


                    }
                });
            });



        </script>

    </div>
</div>