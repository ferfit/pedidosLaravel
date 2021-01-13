<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        
    </head>
    <body class="antialiased">

    

        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div> --}}

        <div class="container-fluid p-0 m-0 cabecera">
            
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block ml-2">
                    @auth
                        <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline bg-danger p-1 rounded text-light">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
                
            @endif
            <div class="d-flex justify-content-center align-items-center">
                <img src="img/logo.png" alt="">
            </div>
            
        </div>

        {{-- Carrito--}}
            <div id="carrito-icono" class="carrito container shadow rounded p-2 bg-white">
                <img src="img/carrito.svg" alt="">
                <span class="valor-carrito" id="valor-carrito"></span>
            </div>
        {{-- Cierre --}}


        {{-------------- listado de productos ------------------
            
        ------------------------------------------------------}}
        <div class="container-fluid"  id="cont-producto">
            @foreach($categorias as $categoria)
                <h2 class=" text-center text-danger mt-5">{{$categoria->nombre}}</h2>
                <br>
                <div class="row justify-content-center p-2" >

                    @foreach (collect($categoria->productos) as $producto)      
                        {{-- Contenedor Producto --}}
                        <div   class="col-5 col-lg-2  bg-white menu-item mx-2 my-3   shadow p-3 rounded d-flex flex-column" id="">
                            <img src="/storage/{{ $producto->imagen /* asset('img/pizza.jpg') */}}" alt="" class="w-75 rounded-circle d-block mx-auto ">
                            <h3 class="nombre_producto mt-2 text-center" data_titulo="{{$producto->titulo}}" >{{$producto->nombre}}</h3>
                            <p class="descripcion_producto m-0 text-center">{{ Str::limit ( strip_tags ( $producto->descripcion ), 100 ) }}</p>
                            <p class="text-center mt-2"><strong>$ <span class="text-center mx-auto">{{$producto->precio}}</span></strong></p>
                            <button class="btn btn-danger boton mx-auto d-block mt-auto shadow rounded-pill" data-id="{{$producto->id}}">Agregar</button>
                        </div>
                    @endforeach
                </div>

            @endforeach
        </div>

        {{--------------------- Pedido -------------------------
        
        ------------------------------------------------------}}
        
        <section class="mt-5 pt-5">
            <h2 class="text-center">Pedido</h2>
            <div class="container">
                
    
                <table class="table w-100">
                    <thead>
                        <tr>  
                              
                            <th scope="col">Producto</th>
                            {{-- <th scope="col">Cantidad</th> --}}
                            <th scope="col">Acción</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
    
                    <tbody id="items">
    
                    </tbody>
                    <tfoot>
                        <tr id="footer">
                            <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
                        </tr>
                    </tfoot>
                </table>
    
                
    
               
              <template id="template-footer">
                  <th scope="row" colspan="1">Total productos</th>
                  
                  <td>
                      <button class="btn btn-danger btn-sm" id="vaciar-carrito">
                          vaciar todo
                      </button>
                  </td>
                  <td class="font-weight-bold">$ <span>5000</span></td>
              </template>
              
              <template id="template-carrito">
                <tr>
                  
                    {{-- <td></td> --}}
                    <td></td>
                    <td>
                        <button class="btn btn-info btn-sm">
                            +
                        </button>
                        <button class="btn btn-danger btn-sm">
                            -
                        </button>
                    </td>
                    <td>$ <span>500</span></td>
                </tr>
              </template>
        </section>

        {{--------------------- Nombre -------------------------
        
        ------------------------------------------------------}}

        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h2 id="ingresaNombre" class="text-center">Ingresa tu nombre</h2>
            <input type="text" class="nombre mt-2 form-control w-50" id="valor">
          </div>
        
        {{-- Metodo de envio --}}
        <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
            <h2 id="ingresaNombre" class="text-center">Método de envio</h2>
            <select class="my-1 opcional shadow selector w-50"  id="metodoDeEnvio" required>
                <option value="">Elija una opción</option>
                <option value="Envio a domicilio">Envio a domicilio (+ $100)</option>
                <option value="Retiro por sucursal">Retiro por sucursal</option>
            </select>
    
            <input type="text" class="direccion mb-4 w-50 mt-3 form-control" placeholder="Escribe tu dirección" id="direccion">
            
        </div>
    
        {{-- metodo de pago --}}
    
        <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
            <h2 class="text-center">Método de pago</h2>
            <select class="my-1 opcional shadow selector w-50" id="metodoDePago" required>
                <option value="">Elija una opción</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Mercado pago">Mercado pago</option>
            </select>
    
            <input type="text" class="direccion mb-4 w-50 mt-3 form-control" placeholder="Abono con $..." id="abono">
            
        </div>
    
    
    
        {{-- boton whatsapp --}}
        <div class="container cont-enviar d-flex justify-content-center align-items-center">
            
            <button class="boton__whatsapp text-center shadow rounded-pill">Enviar</button> 
        </div>
        {{-- footer --}}
        <footer class="footer d-flex justify-content-center align-items-center mt-5">
            <div class="row justify-content-center align-items-center">
              <p class="text-center">| Copyright @ 2020 - </p>
              
              <p class="text-center">TuProyectoWeb |</p>
            </div>
        </footer>


    </body>
</html>
