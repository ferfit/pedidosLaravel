<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
     

    public function index()
    {
        $categorias = Categoria::all();

        

        return view('admin.categorias.index', compact('categorias'));
    }


    public function create()
    {
        return view('admin.categorias.create');
    }

    
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre'=>'required'
        ]);

        Categoria::create([
            'nombre' => $data['nombre']
        ]);

        return redirect()->route('admin.categorias.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('admin.categorias.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $data = request()->validate([
            'nombre'=>'required'
        ]);
        $categoria->nombre = $data['nombre'];   
        $categoria->save();

        return redirect()->route('admin.categorias.index');  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    { 
        $categoria->delete();

        return redirect()->route('admin.categorias.index');  
    }
}
