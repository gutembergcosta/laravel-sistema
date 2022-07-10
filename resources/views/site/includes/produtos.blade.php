<section id="produtos">
    <div class="pagina">

        <div class="area-titular" >
            <div class="titl" >
                <h2>
                    Planos de consórcio
                </h2>
                
            </div>

            <div class="texto-central">
                {!! $dadosGerais['intro_planos'] !!}
            </div>
        </div>

        <div class="grid-produtos">

            @foreach ($produtos as $item)
                <div class="box-produto" >
                    <a href="{{ route('site.plano', $item['id']) }}">
                        <img class="total" src="{{ url('/public/uploads/mini-'.$item->arquivos->where('tipo', 'plano')->first()['arquivo']) }}">
                    </a>
                    <div>
                        <h4>{{ $item['nome'] }}</h4>
                        <a href="{{ route('site.plano', $item['slug']) }}" class="btn" >Saiba mais</a>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</section>