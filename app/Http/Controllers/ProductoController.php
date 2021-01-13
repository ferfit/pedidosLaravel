<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        //validamos los datos
        $data = request()->validate([
            'nombre'=>'required',
            'categoria'=>'required',
            'descripcion'=>'required',
            'precio'=>'required',
            'imagen'=>'required|image'
        ]);

        //obtenemos la ruta de la imagen y la almacenamos con el metodo "store"
        $ruta_imagen = $request['imagen']->store('upload-productos','public');

        //almacenamos en bbdd
        $producto = Producto::create([
            'nombre' => $data['nombre'],
            'categoria_id' => $data['categoria'],
            'descripcion' => $data['descripcion'],
            'precio' => $data['precio'],
            'imagen' => $ruta_imagen
        ]);

        return redirect()->route('admin.productos.index');


    }

    
    public function show(Producto $producto)
    {
        //
    }

    
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();

        return view('admin.productos.edit',compact('categorias','producto'));
    }

    
    public function update(Request $request, Producto $producto)
    {
        //validamos los datos
        $data = request()->validate([
            'nombre'=>'required',
            'categoria'=>'required',
            'precio' =>'required',
            'descripcion'=>'required'
        ]);
        //asignamos los valores
        $producto->nombre = $data['nombre'];
        $producto->categoria_id= $data['categoria'];
        $producto->descripcion= $data['descripcion'];
        $producto->precio= $data['precio'];
       
        //si el usuario sube una nueva imagen
        if(request('imagen')){
            $ruta_imagen = $request['imagen']->store('upload-productos','public');
            //asignamos la imagen 
            $producto->imagen = $ruta_imagen;
        }
        $producto->save();

        return redirect()->route('admin.productos.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('admin.productos.index');  
    }
}
