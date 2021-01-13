<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = Categoria::create([
            'nombre'=>'Pizzas'
            
        ]);
        $categoria2 = Categoria::create([
            'nombre'=>'Empanadas'
            
        ]);
    }
}
