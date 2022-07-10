@extends('layouts.site',[$dadosGerais,$produtos,])

@section('pagina')

    @include('site.includes.slider-area', [$slides])
    @include('site.includes.produtos',[$dadosGerais,$produtos,])
    @include('site.includes.numeros',[$dadosGerais,$numeros])
    {{--@include('site.includes.marcas',[$dadosGerais])--}}

@endsection

