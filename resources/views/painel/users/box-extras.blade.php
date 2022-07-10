
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Opções</h3>
    </div>
    <div class="panel-body" >

        <div class="row">
            <div class="col-md-12" style="margin-bottom: 16px">
                <button id="alterar-senha" data-user_id="{{$item['id']}}" type="button" class="btn btn-info">Alterar senha</button>
            </div>

            @if(Auth::user()->userDados->tipo == 'admin')
                <div class="col-md-12" style="margin-bottom: 16px">
                    <button id="alterar-senha" data-user_id="{{$item['id']}}" type="button" class="btn btn-info">
                        {{ (Auth::user()->userDados->bloqueado == 's') ? 'Desbloquear' : 'Bloquear' }} usuário
                    </button>
                </div>
            @endif

            
        </div>
        
        <div class="row hide">
            <div class="col-md-12">
                <button id="asdf-asf" data-id="{{$item['id']}}" type="button" class="btn btn-danger">Bloquear usuário</button>
            </div>
        </div>
                                            
        <script>
            $(document).ready(function () {

                $("#alterar-senha").click(function (e) {
                    let user_id = $(this).data('user_id')
                    $("#formulario02 input[name='user_id']").val(user_id);
                    $("#formulario02 input[name='novaSenha01']").val('');
                    $("#formulario02 input[name='novaSenha02']").val('');
                    $('#modal-senha').modal('show'); 
                });

                $("#sfasdf-asdf").click(function (e) {
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