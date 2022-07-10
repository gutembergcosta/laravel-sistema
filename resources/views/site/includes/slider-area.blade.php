<section class="owl-area">
    <div class="owl-carousel" id="owl-slides">
        @if($slides)
            @foreach ($slides as $img)
                <div>
                    <img class="total" src="{{ url('/public/uploads/max-'.$img['arquivo']) }}" alt="">
                </div>
            @endforeach
        @endif
    </div>
    <button class="owlBtnPrev owl-btn owl-left">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="owlBtnNext owl-btn owl-right">
        <i class="fas fa-chevron-right"></i>
    </button>
</section>