
<nav class="mobile-nav">
    <ul>

        <li><a href="{{ route('site.inicio') }}">Home</a></li>
        <li><a href="#">Planos</a>
            <ul class="sub-menu">
                @foreach ($produtos as $item)
                    <li><a href="{{ route('site.plano', $item['slug']) }}">{{ $item['nome'] }}</a></li>
                @endforeach
            </ul>        
        </li>
        <li><a href="{{ route('site.institucional') }}">Institucional</a></li>
        <li><a href="{{ route('site.artigos') }}">Artigos</a></li>
        <li><a href="#">Localização</a>
            <ul class="sub-menu">
                <li><a href="{{ route('site.representantes') }}">Minas Gerais</a></li>
            </ul>        
        </li>
        <li><a href="{{ route('site.contato') }}">Contato</a></li>
        <li><a href="{{ route('site.cadastro') }}" class="" >Seja nosso parceiro</a></li>
        <li class="hide"><a href="{{ route('login') }}" >Área restrita</a></li>
        
    </ul>
</nav>

<style>
    .over-nav{
        width: 100%;
        height: 100vh;
        background: #0c4269;
        opacity: .0;
        z-index: 9998;
        float: left;
        position: fixed;
    }
</style>

<div class="over-nav hide" ></div>

<section id="topo-mobile">
    <div class="pagina ">
        <div class="area-topo flex">
            <div class="logo">
                <a href="{{ route('site.inicio') }}" class="total">
                    <img class="total" src="{{ asset('site/imagens/logo.png') }}" alt="" srcset="">
                </a>    
            </div>
            <div class="area-btn" >
                <span><i class="fa fa-bars fa-2x nav-toggle"></i></span>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
  
        // Controls the slide in/out functionality of the menu
        
        var mobileNav = $('.mobile-nav'); // CSS Class of Nav Menu
        var navToggle = $('.nav-toggle'); // CSS Class of Toggle Button
        var content = $('.area-topo'); // Site Container
        var overNav = $('.over-nav'); // Site Container
        
        var isOpen = 0; // Is the menu open or closed?
        var menuWidth = $('.mobile-nav').css('width');
        var menuWidthInverse = "-" + menuWidth;
        
        $(navToggle).click(function(){
            
            if ( isOpen == 0 ) {
                $(mobileNav).animate({'left' : '0px'}, 300);
                $(mobileNav).addClass('sombra');
                //$(content).animate({'left' : menuWidthInverse}, 300);
                $(navToggle).removeClass('fa-bars');
                $(overNav).removeClass('hide');
                $(navToggle).addClass('fa-times');
                isOpen++;
            } else {
                $(mobileNav).animate({'left' : menuWidthInverse}, 300);
                $(mobileNav).removeClass('sombra');

                //$(content).animate({'left' : 0}, 300);
                $(navToggle).removeClass('fa-times');
                $(navToggle).addClass('fa-bars');
                isOpen--;
            }
            
        });

        $('.over-nav').click(function(){
            $(mobileNav).animate({'left' : menuWidthInverse}, 300);
            $(mobileNav).removeClass('sombra');
            //$(content).animate({'left' : 0}, 300);
            $(overNav).addClass('hide');
            $(navToggle).removeClass('fa-times');
            $(navToggle).addClass('fa-bars');
            isOpen--;   
        });
        
        // Controls the nested menu behaviour
        
        var primaryLink = $('.mobile-nav ul li a');
        var subMenu = $('.mobile-nav ul li .sub-menu');
        
        $(primaryLink).click(function(){
            $(this).next().slideToggle(300);
        });
  
    });
</script>