<section id="produtos">
    <div class="pagina">

        <div class="area-titular" >
            <div class="titl" >
                <h2>
                    Artigos
                </h2>
                
            </div>

            <div class="texto-central">
                {!! $dadosGerais['intro_artigos'] !!}
            </div>
        </div>

        <div class="grid-artigos">

            @php
                $miniatura = (isMobile())? 'mini' : 'square';
            @endphp

            @foreach ($artigos as $item)
                <div class="box-artigo" >
                    <div class="imagem">
                        <a href="{{ route('site.artigo', $item['id']) }}">
                            <img class="total" src="{{ url('/public/uploads/'.$miniatura.'-'.$item->arquivos->where('tipo', 'destaque')->first()['arquivo']) }}">
                        </a>
                    </div>
                    <div class="texto">
                        <div class="titulo">
                            <a href="{{ route('site.artigo', $item['id']) }}"><h4>{{ $item['nome'] }}</h4></a>
                        </div>
                        <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit</p>
                        <div class="footer">
                            <a href="{{ route('site.artigo', $item['id']) }}" class="btn" >Saiba mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</section>