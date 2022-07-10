@php
        $tela = (isMobile())? 'mobile' : 'desktop';
@endphp


@if ($tela == 'mobile')
    <style>
        .navbar .brand{
            display: block;
            padding: 15px 10px;
            width: auto;
        }

        .navbar #navbar-menu{
            width: 120px;

        }

        .navbar .navbar-btn {
            padding: 5px 0;
        }

        
    </style>
@endif


<nav class="navbar navbar-default navbar-fixed-top">

    @if ($tela == 'mobile')
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="brand" style="display: block">
            <a href="admin"><img src="{{ asset('/assets/img/logo-dark.png') }}" width="100" alt="Klorofil Logo" class="img-responsive logo"></a>
        </div>
    @endif

    @if ($tela == 'desktop')
        <div class="brand">
            <a href="admin"><img src="{{ asset('/assets/img/logo-dark.png') }}" width="100" alt="Klorofil Logo" class="img-responsive logo"></a>
        </div>
    @endif

    
    <div class="container-fluid">

        @if ($tela == 'desktop')
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" value="" class="form-control" placeholder="Nome...">
                    <span class="input-group-btn"><button type="button" class="btn btn-primary">Buscar</button></span>
                </div>
            </form>
        @endif
        

        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                        <i class="far fa-bell"></i>
                        <span class="badge bg-danger">5</span>
                    </a>
                    <ul class="dropdown-menu notifications">
                        <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Notificação 01</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>Notificação 02</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Notificação 03</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Notificação 04</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Notificação 05</a></li>
                        <li><a href="#" class="more">Ver todas notificações</a></li>
                    </ul>
                </li>
                <li class="dropdown hide">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Tutoriais</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Abrir um chamado</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('/assets/img/user.png') }}" class="img-circle" alt="Avatar"> <span> {{ (Auth::user()->userDados->tipo == 'admin') ? 'Administrador' : "Representante" }} </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.perfil') }}"><i class="lnr lnr-user"></i> <span>Meu perfil</span></a></li>
                        <li><a href="{{ route('sair') }}"><i class="lnr lnr-exit"></i> <span>Sair</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>