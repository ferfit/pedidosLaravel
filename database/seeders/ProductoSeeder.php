<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = Producto::create([
            'nombre'=>'Pizza de Muzzarella',
            'descripcion' => 'salsa de tomate y queso muzzarella',
            'precio' => '200',
            'imagen' => 'upload-productos/22EUV7giuNfPIoFu84DI6mHEhtfKEq9NSgq2LPhb.jpg',
            'categoria_id' => '1'
        ]);
        $producto2 = Producto::create([
            'nombre'=>'Pizza de Muzzarella con jamón',
            'descripcion' => 'salsa de tomate, jamón cocido y queso muzzarella',
            'precio' => '240', 
            'imagen' => 'upload-productos/ALvvcrqh183FeAOpfF3aDdIdsTrkj9Qp7m1VL2zX.jpg',
            'categoria_id' => '1'
        ]); 
        $producto3 = Producto::create([
            'nombre'=>'Pizza de Jamón y huevo',
            'descripcion' => 'salsa de tomate, jamón cocido y huevo duro',
            'precio' => '250',
            'imagen' => 'upload-productos/GhR76vcetwEYnKlI26VuMzNad5s38zWZjdqul6io.jpg',
            'categoria_id' => '1'
        ]);
        $producto4 = Producto::create([
            'nombre'=>'Pizza de Jamón, tomate y huevo',
            'descripcion' => 'salsa de tomate, jamón cocido, tomate y huevo duro',
            'precio' => '260',
            'imagen' => 'upload-productos/22EUV7giuNfPIoFu84DI6mHEhtfKEq9NSgq2LPhb.jpg',
            'categoria_id' => '1'
        ]);
        $producto5 = Producto::create([
            'nombre'=>'Pizza de Jamón y morrón',
            'descripcion' => 'salsa de tomate, jamón cocido y morrón',
            'precio' => '250',
            'imagen' => 'upload-productos/ALvvcrqh183FeAOpfF3aDdIdsTrkj9Qp7m1VL2zX.jpg',
            'categoria_id' => '1'
        ]);
        $producto6 = Producto::create([
            'nombre'=>'Pizza de Napolitana',
            'descripcion' => 'salsa de tomate, tomate y queso muzzarella',
            'precio' => '250',
            'imagen' => 'upload-productos/GhR76vcetwEYnKlI26VuMzNad5s38zWZjdqul6io.jpg',
            'categoria_id' => '1'
        ]);
        $producto7 = Producto::create([
            'nombre'=>'Pizza de Napolitana con jamón',
            'descripcion' => 'salsa de tomate, tomate, jamón cocido y queso muzzarella',
            'precio' => '250',
            'imagen' => 'upload-productos/22EUV7giuNfPIoFu84DI6mHEhtfKEq9NSgq2LPhb.jpg',
            'categoria_id' => '1'
        ]);
        $producto8 = Producto::create([
            'nombre'=>'Pizza de Calabresa',
            'descripcion' => 'salsa de tomate, longaniza y queso muzzarella',
            'precio' => '260',
            'imagen' => 'upload-productos/ALvvcrqh183FeAOpfF3aDdIdsTrkj9Qp7m1VL2zX.jpg',
            'categoria_id' => '1'
        ]);
        $producto9 = Producto::create([
            'nombre'=>'Pizza de Calabresa con jamón',
            'descripcion' => 'salsa de tomate, longaniza, jamón cocido y queso muzzarella',
            'precio' => '270',
            'imagen' => 'upload-productos/GhR76vcetwEYnKlI26VuMzNad5s38zWZjdqul6io.jpg',
            'categoria_id' => '1'
        ]);
        $producto10 = Producto::create([
            'nombre'=>'Pizza de Capresse',
            'descripcion' => 'salsa de tomate, tomate, albahaca y queso muzzarela',
            'precio' => '280',
            'imagen' => 'upload-productos/22EUV7giuNfPIoFu84DI6mHEhtfKEq9NSgq2LPhb.jpg',
            'categoria_id' => '1'
        ]);
        

        $empanada = Producto::create([
            'nombre'=>'Empanada de Jamón y queso',
            'descripcion' => 'Jamón cocido y queso',
            'precio' => '38',
            'imagen' => 'upload-productos/SMKBbqsJ37NypGzzxfszFchw0E4HksJZC26p8KUa.jpg',
            'categoria_id' => '2'
        ]);
        $empanada2 = Producto::create([
            'nombre'=>'Empanada de Choclo',
            'descripcion' => 'Choclo y salsa blanca',
            'precio' => '38',
            'imagen' => 'upload-productos/thbPXNuOb9oAeycWix2HTDTMV2yy0VlfpC3ubKWz.jpg',
            'categoria_id' => '2'
        ]); 
        $empanada3 = Producto::create([
            'nombre'=>'Empanada de Calabaza y queso',
            'descripcion' => 'Calabaza y queso',
            'precio' => '38',
            'imagen' => 'upload-productos/37C7ShAGtW0kvO0FjegmnVUbPQrsPZ1GTsGklmcJ.jpg',
            'categoria_id' => '2'
        ]);
        $empanada4 = Producto::create([
            'nombre'=>'Empanada de Carne cortada a cuchillo',
            'descripcion' => 'Carne cortada acuchillo, huevo, cebolla, aceitunas',
            'precio' => '38',
            'imagen' => 'upload-productos/SMKBbqsJ37NypGzzxfszFchw0E4HksJZC26p8KUa.jpg',
            'categoria_id' => '2'
        ]);
        $empanada5 = Producto::create([
            'nombre'=>'Empanada de Carne suave',
            'descripcion' => 'Carne picada, huevo, cebolla',
            'precio' => '38',
            'imagen' => 'upload-productos/thbPXNuOb9oAeycWix2HTDTMV2yy0VlfpC3ubKWz.jpg',
            'categoria_id' => '2'
        ]);
        $empanada6 = Producto::create([
            'nombre'=>'Empanada de Carne picante',
            'descripcion' => 'Carne picada, ají picante, huevo, cebolla',
            'precio' => '38',
            'imagen' => 'upload-productos/37C7ShAGtW0kvO0FjegmnVUbPQrsPZ1GTsGklmcJ.jpg',
            'categoria_id' => '2'
        ]);
        $empanada7 = Producto::create([
            'nombre'=>'Empanada de Carne on aceitunas',
            'descripcion' => 'Carne picada, huevo, cebolla, aceitunas',
            'precio' => '45',
            'imagen' => 'upload-productos/SMKBbqsJ37NypGzzxfszFchw0E4HksJZC26p8KUa.jpg',
            'categoria_id' => '2'
        ]);
        $empanada8 = Producto::create([
            'nombre'=>'Empanada de Pollo',
            'descripcion' => 'Pollo, huevo, cebolla',
            'precio' => '45',
            'imagen' => 'upload-productos/thbPXNuOb9oAeycWix2HTDTMV2yy0VlfpC3ubKWz.jpg',
            'categoria_id' => '2'
        ]);
        $empanada9 = Producto::create([
            'nombre'=>'Empanada de Verdura',
            'descripcion' => 'Acelga, salsa blanca, cebolla',
            'precio' => '45',
            'imagen' => 'upload-productos/37C7ShAGtW0kvO0FjegmnVUbPQrsPZ1GTsGklmcJ.jpg',
            'categoria_id' => '2'
        ]);
        $empanada10 = Producto::create([
            'nombre'=>'Empanada de Capresse',
            'descripcion' => 'Tomate, albahaca y queso muzzarela',
            'precio' => '45',
            'imagen' => 'upload-productos/SMKBbqsJ37NypGzzxfszFchw0E4HksJZC26p8KUa.jpg',
            'categoria_id' => '2'
        ]);
        
    }
}
