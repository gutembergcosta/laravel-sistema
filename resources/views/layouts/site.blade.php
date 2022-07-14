<!doctype html>
<html lang="pt-br">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Consórcio Net Brasil @isset($tituloPagina) - {{ $tituloPagina }} @endisset</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link rel="icon" type="image/png" href="{{ asset('site/imagens/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,500&display=swap" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" >

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" >

    <link rel="stylesheet" href="{{ asset('site/css/estilos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/owlslider/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owlslider/owl.theme.default.min.css') }}">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>

    <script src="{{ asset('assets/owlslider/owl.carousel.min.js') }}"></script>




    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Consórcio Net Brasil" />
    <meta property="og:description" content="Seja nosso representante de vendas" />
    <meta property="og:url" content="http://www.consorcionetbrasil.com.br/" />
    <meta property="og:site_name" content="Consórcio Net Brasil" />
    <meta property="og:image" content="http://consorcionetbrasil.com.br/tema/imagens/business/01.jpg">
</head>

<body>

    @php
        $tela = (isMobile())? 'mobile' : 'desktop';
    @endphp


    @include("site.includes.topo-$tela",[$dadosGerais,$produtos,]) 

    @yield('pagina')

    <section id="footer">
        <div class="pagina ">
            <div class="area-footer ">
                <div class="logo flex">
                    <img src="{{ asset('site/imagens/logo02.jpg') }}" alt="" srcset="">
                   
                </div>
                <div class="navbar">
                    <nav>
                        <h4>Navegação</h4>
                        <ul>
                            <li><a href="{{ route('site.inicio') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                            <li><a href="{{ route('site.institucional') }}"><i class="fas fa-chevron-right"></i> Institucional</a></li>
                            <li><a href="{{ route('site.artigos') }}"><i class="fas fa-chevron-right"></i> Artigos</a></li>
                            <li><a href="{{ route('site.representantes') }}"><i class="fas fa-chevron-right"></i> Localização</a></li>
                            <li><a href="{{ route('site.contato') }}"><i class="fas fa-chevron-right"></i> Fale Conosco</a></li>
                            <li><a href="{{ route('site.cadastro') }}" class="" ><i class="fas fa-chevron-right"></i> Seja nosso representante</a></li>
                            <li><a href="{{ route('login') }}" class="" ><i class="fas fa-chevron-right"></i> Área restrita</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="navbar">
                    <nav>
                        <h4>Planos de consórcio</h4>
                        <ul>
                            @foreach ($produtos as $item)
                                <li><a href="{{ route('site.plano', $item['slug']) }}">{{ $item['nome'] }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="social-media">
                    <h4>Redes sociais</h4>
                    <ul class="flex">
    
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
                <div class="endereco">
                    <h4>Localização</h4>

                    <div class="local">
                        <p>{!! nl2br($dadosGerais['endereco_full']) !!}</p>
                    </div>

                </div>
                
                
            </div>
            <div class="assinatura total text-center">
                <p>Nome da Empresa | 2004 - {{date("Y")}} | Todos Direitos Reservados</p>
                
            </div>
        </div>
    </section>

    <a href="https://api.whatsapp.com/send?phone=55{{ $dadosGerais['zap'] }}&amp;text=Olá, Estou entrando em contato pelo site e gostaria de mais informações sobre:." class="btn-zap" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

</body>


<script>

    function enviaForm(dataform,destino){

        $.ajax({
            url: destino,
            type:'POST',
            dataType: "json",
            data: dataform,
            success: function(data) {
                
                if(data['msg'])alert(data['msg']);
                if(data['errors'])msgAlerta(data['errors']);
                if(data['destino']){
                    if(data['destino'] == 'reload'){
                        location.reload();
                    }else{
                        window.location.href = data['destino'];
                    }
                }


            }
        });
    }

    function blocoErroMsg(msg){

        return  `<div class='alert alert-danger alert-dismissible'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>${msg}</strong>.
                </div>`;
    }

    function msgAlerta(matriz){

        //console.log(item.original); return;

        let divHtml = '';

        Object.keys(matriz.original).forEach(function (item) {
            divHtml += blocoErroMsg(matriz.original[item][0])
        });

        $("#msgz").text('').html(divHtml);
        alert('Erro');
        gotop();

    }

    $("#msgz").on('click', '.close',function (e) {	
        e.preventDefault();
        $(this).closest('.alert-danger').fadeOut(300); return;
    });

    function gotop(){
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }

    $(document).ready(function() {

        $('#owl-slides').owlCarousel({
            autoHeight: true,
            loop:true,
            margin:0,
            items:1,
            nav:false,
            slideTransition: 'fade',
            autoplay:true,
            autoplayTimeout:6000,
            animateIn: 'fadeIn', // add this
            animateOut: 'fadeOut' // and this
            
        });

        $('.owlBtnNext').click(function() {
            $('#owl-slides').trigger('next.owl.carousel');
        });

        $('.owlBtnPrev').click(function() {
            $('#owl-slides').trigger('prev.owl.carousel');
        });

        $('#owl-marcas').owlCarousel({
            autoHeight: true,
            loop:true,
            margin:35,
            nav:false,
            //slideTransition: 'fade',
            autoplay:true,
            autoplayTimeout:6000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
            
        });

        $('.owlMarcasBtnNext').click(function() {
            $('#owl-marcas').trigger('next.owl.carousel');
        });

        $('.owlMarcasBtnPrev').click(function() {
            $('#owl-marcas').trigger('prev.owl.carousel');
        });

    });
    

    </script>

</html>