<section id="lista-marcas" class="bg-contraste">
    <div class="pagina">

        <div class="area-titular" >

            <div class="titl" style="margin-bottom: " >
                <h2>
                    Parceiros
                </h2>
            </div>

            <section class="owl-area" style="margin-top: 4rem">
                <div class="owl-carousel" id="owl-marcas">
                    @if($marcas)
                        @foreach ($marcas as $img)
                            <div>
                                <img class="total" src="{{ url('/public/uploads/square-'.$img['arquivo']) }}" alt="">
                            </div>
                        @endforeach
                    @endif
                </div>

                <button class="owlMarcasBtnPrev owl-btn owl-left">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button class="owlMarcasBtnNext owl-btn owl-right">
                    <i class="fas fa-chevron-right"></i>
                </button>

            </section>

        </div>
    </div>
</section>