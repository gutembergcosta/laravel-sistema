@extends('layouts.painel')

@section('pagina')

<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="content">
                    <div class="header">
                        <div class="logo text-center"><img src="http://localhost/painel03//assetz/img/logo-dark.png" width="139" alt="Logo"></div>
                        <p class="lead">Painel de controle</p>
                    </div>
                    <form id="form-login" class="form-auth-small" action="">
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input type="email" name="email" required class="form-control" id="signin-email" value="" placeholder="Email">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block">REDEFINIR SENHA</button>
                    </form>

                    <script>
                    $(document).ready(function () {

                        $("#form-login").submit(function (e) {
                            e.preventDefault();

                            var data = $('#form-login').serialize();

                            $.ajax({
                                url: "http://localhost/painel03/Forms/redefinirSenha",
                                type:'POST',
                                dataType: "json",
                                data: data,
                                success: function(data) {
                                    
                                    if (data['status'] == 0) {
                                        alert(data['msg']);
                                        location.reload();
                                    }

                                    if (data['status'] > 0){
                                        alert(data['msg']);
                                    }
                                }
                            });

                        });
                    });

                    </script>
                </div>


                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection

