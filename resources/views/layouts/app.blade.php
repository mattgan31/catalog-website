@extends('adminlte::page')

@section('content_header')
    <h1>
        @yield('title')
    </h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
@stop

@section('js')
    <link href="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" rel="stylesheet">
    <script>
        console.log('Hi!');
    </script>
@stop
