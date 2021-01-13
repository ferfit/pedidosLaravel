@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container mt-2">
        <h1 class="tart">Listado de categorias</h1>
    </div>

    <div class="container mt-3 ">
        <a href="{{ route('admin.categorias.create' )}}" class="btn btn-success shadow">Crear categoria</a>
    </div>
    
@stop

@section('content')
    
    <div class="container mx-auto">
        <table class="table table-bordered table bg-white shadow">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <div class="row">
                            <a href="{{ route('admin.categorias.edit', $categoria )}}" class="btn btn-primary mr-2">Editar</a>
                        
                            <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger d-inline mr-1  "
                                    value="Eliminar">
                            </form>
                        </div>
                        
                    </td>
                </tr>  
                @endforeach
                
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop