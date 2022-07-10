@extends('layouts.painel')

@section('pagina')

<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="content">
                    <div class="header">
                        <div class="logo text-center"><img src="{{ asset('/assets/img/logo-dark.png') }}" width="139" alt="Logo"></div>
                        <p class="lead">Redefinir senha</p>
                    </div>
                    <form id="form-login" class="form-auth-small" action="{{ route($actionForm)  }}">
                        
                        @csrf

                        <input type="hidden" name="token" value="{{$token}}" >


                        <div class="form-group">
                            <label class="control-label sr-only">Senha</label>
                            <input type="password"  name="novaSenha01" class="form-control" value="" placeholder="Nova senha" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only">Confirmar senha</label>
                            <input type="password"  name="novaSenha02" class="form-control" value="" placeholder="Confirmar nova senha" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block">NOVA SENHA</button>
                        <div class="bottom">
                            <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('login') }}">Login</a></span>
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

