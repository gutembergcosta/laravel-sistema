@extends('layouts.site',[$dadosGerais,$produtos,$tituloPagina])

@section('pagina')
    @include('site.includes.titular',[$tituloPagina])
    @include('site.includes.form-contato')
@endsection
