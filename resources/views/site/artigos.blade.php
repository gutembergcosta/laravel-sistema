@extends('layouts.site',[$dadosGerais,$produtos,$tituloPagina])

@section('pagina')
    @include('site.includes.titular',[$tituloPagina]) 
    @include('site.includes.artigos',[$dadosGerais,$produtos,]) 
@endsection