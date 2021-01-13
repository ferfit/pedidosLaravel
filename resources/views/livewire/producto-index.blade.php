<div class="py-5">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container ">
        
        <div class="row  py-2 rounded">
            <button class="btn btn-info mx-2 shadow" wire:click = "resetFilter">Todos</button>
            <div class="dropdown shadow">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categorias
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($categorias as $categoria)
                        <a wire:click = "$set('category_id',{{ $categoria->id }})" class="dropdown-item" href="#">{{$categoria->nombre}}</a>
                    @endforeach
                </div>
            </div>
        </div>

        

        <table class="table bg-white mt-2 shadow">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th >Descripción</th>
                    <th class="d-none d-lg-block">Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{$producto->nombre}}</td>
                        <td >{{$producto->descripcion}}</td>
                        <td class="d-none d-lg-block">${{$producto->precio}}</td>
                        <td>
                            <div class="row">
                                <a href="{{ route ('admin.productos.edit', $producto)}}" class="btn btn-primary mr-2 mb-1 shadow">Editar</a>
                            
                                <form action="{{ route ('admin.productos.destroy', $producto)}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger d-inline mr-1 shadow  "
                                        value="Eliminar">
                                </form>
                            </div>
                        </td>
                    </tr> 
                @endforeach
                
            </tbody>
        </table>

        
            <div class=" mx-auto">
                {{$productos->onEachSide(0)->links()}}
            </div>
        
        
        

    </div>
    
</div>
