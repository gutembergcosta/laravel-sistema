<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmar</h4>
            </div>

            <div class="modal-body">
                <p></p>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Deletar</a>
            </div>
        </div>
    </div>
</div>

<div id="modal-item" class="modal fade in" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h4 class="modal-title">Modal</h4>
            </div>
            <div class="modal-body" style="overflow: hidden">


                <form id="formulario-modal" class="formulario" action="" method="post">

                    <div class="col-md-12">


                        <div id="msgz-modal"></div>

                        <input type="hidden" name="imagem">
                        <input type="hidden" name="formulario" value="modal">
                        <input type="hidden" name="token" value="wu6qm611b1313b1e6b">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Password:</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Password confirmação:</label>
                                <input type="password" class="form-control" name="passconf">
                            </div>

                            <div class="quebra"></div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                    </div>

                </form>

                <script>
                    $(document).ready(function () {

                        $("#formulario-modal").submit(function (e) {
                            e.preventDefault();

                            var data = $(this).serializeArray();

                            $.ajax({
                                url: "http://localhost/painel03/usuarios/salvar",
                                type: 'POST',
                                dataType: "json",
                                data: data,
                                success: function (data) {

                                    if (data['status'] == 0) {
                                        alert('Item salvo com sucesso!');
                                        //window.location.href = data['destino'];
                                        location.reload();
                                    }

                                    if (data['status'] > 0) {
                                        $("#msgz-modal").text('').html(data['msg']);
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
</div>
