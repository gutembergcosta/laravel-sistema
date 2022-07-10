
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Recusar cadastro</h3>
    </div>
    <div class="panel-body" >

        
        <div class="row">
            <div class="col-md-12">
                <button id="deletar-cadastro" data-id="{{$item['id']}}" type="button" class="btn btn-danger">Excluir</button>
            </div>
        </div>
                                            
        <script>
            $(document).ready(function () {
                $("#deletar-cadastro").click(function (e) {
                    if (confirm("Deseja realmente deletar este cadastro??") == true) {
            
                        let excluido = 0;

                        $.ajax({
                            url: "{{ url('admin/deletar-cadastro') }}",
                            dataType: "text",
                            async:false,
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': $(this).data('id')                                       
                            },
                            success: function (data) 
                            {
                                console.log('data: ' +data);
                                if(data == 1){
                                    alert('Cadastro excluído com sucesso!');

                                    window.location.href = "{{ route('admin.cadastros') }}";
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