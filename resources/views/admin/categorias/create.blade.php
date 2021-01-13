@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    


        <div class="col-md-6 mt-5 py-4 mx-auto bg-white rounded shadow-lg">

            <h2 class="text-center mt-3">Crear nuevo categoria</h2>
            
            <form method="POST" action="{{ route ('admin.categorias.store' )}}" novalidate>
                @csrf
                <div class="form-group my-5 mx-2">
                    <label for="titulo">Nombre</label>
                    <input type="text" 
                    name="nombre" 
                    class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                        value="">
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mx-2">
                    <input type="submit" class="btn btn-success shadow rounded" value="Agregar categoria">
                </div>

            </form>
        
        </div>
        
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop