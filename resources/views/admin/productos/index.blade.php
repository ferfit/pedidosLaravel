@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container my-4">
        <h1 class="tart">Listado de productos</h1>
    </div>

    <div class="container mt-2 ">
        <a href="{{ route('admin.productos.create' )}}" class="btn btn-success shadow">Crear producto</a>
    </div>
    
@stop

@section('content')
    @livewire('producto-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop