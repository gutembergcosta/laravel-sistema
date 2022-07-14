<section id="topo">
    <div class="pagina ">
        <div class="grid-topo">
            <div class="logo flex">
                <a href="{{ route('site.inicio') }}" class="total">
                    <img class="total" src="{{ asset('site/imagens/logobase.png') }}" alt="" srcset="">
                </a>    
            </div>
            <div class="vazio01 flex">
            </div>
            <div class="telefone ">
                <ul class="flex">
                    <li> <i class="fas fa-phone-alt"></i> <span>{{ $dadosGerais['tel01'] }}</span> </li>
                    <li> <i class="fas fa-phone-alt"></i> <span>{{ $dadosGerais['tel02'] }}</span> </li>
                </ul>
            </div>
            <div class="social-media">
                <ul class="flex right">
                    <li> 
                        <a href="{{ $dadosGerais['facebook'] }}" >
                            <i class="fab fa-facebook"></i>
                        </a>  
                    </li>
                    <li> 
                        <a href="{{ $dadosGerais['instagram'] }}" >
                            <i class="fab fa-instagram"></i>
                        </a>  
                    </li>
                    <li> 
                        <a href="{{ $dadosGerais['linkedin'] }}" >
                            <i class="fab fa-linkedin"></i>
                        </a>  
                    </li>
                </ul>

                    
            </div>
            <div class="navbar-area area-nav">
                
                <nav>
                    <ul>
                        <li><a href="{{ route('site.inicio') }}">Home</a></li>
                        <li><a href="{{ route('site.planos') }}">Planos</a>
                            <ul>
                                @foreach ($produtos as $item)
                                    <li><a href="{{ route('site.plano', $item['slug']) }}">{{ $item['nome'] }}</a></li>
                                @endforeach
                            </ul>        
                        </li>
                        <li><a href="{{ route('site.institucional') }}">Institucional</a></li>
                        <li><a href="{{ route('site.representantes') }}">Localização</a>
                        <li><a href="{{ route('site.faq') }}">Dúvidas Frequentes</a>
                        <li><a href="{{ route('site.contato') }}">Contato</a></li>
                    </ul>
                </nav>
            </div>
            <div class="call-cadastro flex ">
                <a href="{{ route('site.cadastro') }}" class="" >
                    <i class="fas fa-laugh"></i>
                    Seja nosso parceiro
                </a>
                <a href="{{ route('login') }}" class="right" >
                    <i class="fas fa-user"></i>
                    Área restrita
                </a>
            </div>
        </div>
    </div>
</section>