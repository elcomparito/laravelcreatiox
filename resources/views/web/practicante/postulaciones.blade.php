@extends('web.partials.master')

@section('title')
    Postulaciones - Telepráctica
@endsection

@section('estilos')
@endsection

@section('content')
    {{ auth()->user()->id }}
    <div id="app">
        <web-practicante-postulaciones-component></web-practicante-postulaciones-component>
    </div>
@endsection
