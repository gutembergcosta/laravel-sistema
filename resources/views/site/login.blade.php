@extends('layouts.painel')

@section('pagina')

<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="content">
                    <div class="header">
                        <div class="logo text-center"><img src="{{ asset('/assets/img/logo-dark.png') }}" width="139" alt="Logo"></div>
                        <p class="lead">Painel de controle</p>
                    </div>
                    <form id="form-login" class="form-auth-small" action="{{ route($actionForm)  }}">
                        
                        @csrf
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input type="email" name="email" class="form-control" id="signin-email" value="" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Senha</label>
                            <input type="password"  name="senha" class="form-control" id="signin-password" value="" placeholder="Senha" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                        <div class="bottom">
                            <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('redefinir-senha') }}">Redefinir senha</a></span>
                        </div>
                    </form>

                    <script>


                        $(document).ready(function () {

                            $("#form-login").submit(function (e) {
                                e.preventDefault();
                                var data = $(this).serializeArray();
                                enviaForm(data, $(this).attr('action'));

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

