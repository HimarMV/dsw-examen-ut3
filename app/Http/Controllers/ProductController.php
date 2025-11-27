<?php
//Himar Martín Vega

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function store(Request $request)
    {
        $nombreProducto = $request->input('nombre-producto');
        $descripcionProducto = $request->input('descripcion-producto');
        $precio = $request->input('precio');
        $unidades = $request->input('unidades');
        $categoriaProducto = $request->input('categoria-producto');
       

         $request->validate([
           
            'nombre-producto' => [
                'required',
                'min:3',
                'max:50',
            ],

            'descripcion-producto' => 'required',

             'precio' => [
                'required',
                'integer',
                'min:1',
                'max:3000'
            ],

            'unidades' => [
                'required',
                'min:1'
            ],

            'categoria-producto' => [
                'required',
                'in:Electrónica,Deporte',
            ],
      
           
        ]);

        $linea = '"' . $nombreProducto . '";"' . $descripcionProducto . '";"' . $categoriaProducto . '";"' . $precio . ";" . $unidades . "\"\n";

        file_put_contents(storage_path('app/productos.csv'), $linea, FILE_APPEND);

       return redirect()->route('product.create')->with('status', 'Producto guardado correctamente. Número de unidades registradas:' , $unidades);
    }

}