@extends('layouts.site',[$dadosGerais,$produtos,])

@section('pagina')
    @include('site.includes.titular',[$tituloPagina])
    @include('site.includes.representantes',[$dadosGerais,$representantes,])
@endsection