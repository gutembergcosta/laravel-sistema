
<section id="base">

    <div class="pagina">
        <div class="textual m-auto">

            @isset($textual['img'])
                <img class="img-destaque total" src="{{ url('/public/uploads/max-'.$textual['img']) }}" alt="" srcset="">
            @endisset

            @isset($textual['video'])
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$textual['video']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            @endisset

            {!! $textual['texto'] !!}
            
        </div>
    </div>
    

</section>