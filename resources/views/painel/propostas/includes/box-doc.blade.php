@php
    $thumb = (isset($thumb))? $thumb  :'thumb';
@endphp

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $titulo }} </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 _item" style="{{ ($img) ? '' : 'display: none' }}">
                <div>
                    <a class="link-img" target="_blank" href="@if($img){{ url('/public/uploads/max-'.$img['arquivo']) }}@endif">
                        <img class="total" src="@if($img){{ url('/public/uploads/'.$thumb.'-'.$img['arquivo']) }}@endif">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>