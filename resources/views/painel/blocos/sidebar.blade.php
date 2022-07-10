<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">

                <li><a href="{{ route('admin.home') }}" class="active"><i class="fas fa-cog"></i> <span>Início</span> </a></li>


                @if (Auth::user()->userDados->tipo == 'admin')

                    <li><a href="{{ route('admin.dados-gerais') }}"><i class="fas fa-cog"></i> <span>Dados Gerais</span> </a></li>
                    <li>
                        <a href="#subPages00" data-toggle="collapse" class="collapsed hide"><i class="fas fa-cog"></i> <span>Dados Gerais</span> <i class="icon-submenu fas fa-chevron-right"></i></a>
                        <div id="subPages00" class="collapse ">
                            <ul class="nav">
                                <li><a href="" class="">Contatos</a></li>
                                <li><a href="admin/dados-gerais/textos" class="">Textos</a></li>
                                <li><a href="admin/dados-gerais/imagens" class="">Imagens</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ route('admin.propostas') }}"><i class="fas fa-cog"></i> <span>Propostas</span> </a></li>
                    <li><a href="{{ route('admin.planos') }}"><i class="fas fa-cog"></i> <span>Planos</span></a></li>
                    <li><a href="{{ route('admin.artigos') }}"><i class="fas fa-cog"></i> <span>Artigos</span></a></li>
                    <li><a href="{{ route('admin.tabelas') }}"><i class="fas fa-cog"></i> <span>Tabelas</span></a></li>
                    <li><a href="{{ route('admin.categorias') }}"><i class="fas fa-cog"></i> <span>Categorias</span></a></li>
                    <li><a href="{{ route('admin.cadastros') }}"><i class="fas fa-cog"></i> <span>Cadastros</span></a></li>

                    <li class='hide'><a href=""><i class="fas fa-cog"></i> <span>xxx</span><span class="badge drt">7</span></a></li>
                    <li><a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fas fa-cog"></i> <span>Usuários</span> <i class="icon-submenu fas fa-chevron-right"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ route('admin.users') }}" class="">Lista</a></li>
                            <li><a href="{{ route('admin.perfil') }}" class="">Perfil</a></li>
                        </ul>
                    </div>
                    </li>

                @endif

                @if (Auth::user()->userDados->tipo == 'representante')
                    

                    <li><a href="{{ route('admin.propostas') }}"><i class="fas fa-cog"></i> <span>Minhas propostas</span> </a></li>
                    <li><a href="{{ route('admin.perfil') }}"><i class="fas fa-cog"></i> <span>Perfil</span> </a></li>
                    

                @endif

            </ul>
        </nav>
    </div>
</div>