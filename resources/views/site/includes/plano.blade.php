
<section id="base">

    <div class="pagina plano">

        <div class="textual-plano">

            <img class="img-destaque total" src="{{ url('/public/uploads/mini-'.$produto->arquivos->where('tipo', 'plano')->first()['arquivo']) }}" alt="" srcset="">

            {!! $produto['texto'] !!}

        </div>

        <div class="textual-form">
            @include('site.includes.form-orcamento',[$tituloPagina])
        </div>
    </div>
    

</section>