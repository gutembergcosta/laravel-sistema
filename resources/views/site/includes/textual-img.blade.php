
<section id="base">

    <div class="pagina">
        <div class="textual m-auto">

            @isset($textual['img'])
                <img class="img-destaque total" src="{{ url('/public/uploads/max-'.$textual['img']) }}" alt="" srcset="">
            @endisset

            {!! $textual['texto'] !!}
            
        </div>
    </div>
    

</section>