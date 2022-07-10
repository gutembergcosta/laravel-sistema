@extends('layouts.site',[$dadosGerais,$produtos,$tituloPagina])

@section('pagina')
    @include('site.includes/titular',[$dadosGerais,$tituloPagina])
    @include('site.includes/textual',[$dadosGerais])
@endsection