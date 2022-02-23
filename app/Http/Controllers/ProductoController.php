<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use Inertia\Inertia;

class ProductoController extends Controller
{
    //
    public function store(Request $request){
        $producto= new Producto();
        $producto-> idTipoPasta=$request->idTipoPasta;
        $producto-> codigo=$request->codigo;
        $producto-> cantidad=$request->cantidad;
        $producto-> precio=$request->precio;
        $producto-> peso=$request->peso;

        

        $producto->save();
    }

    //
    public function index(){
        $producto=Producto::all();
        return Inertia::render('Producto',['producto'=>$producto]);
        
      
    }
    public function indexData(){
        $producto=Producto::all();
        
        return ['producto'=>$producto];
    }
public function update(Request $request){
        $producto= Producto::findOrFail($request->id);
        $producto-> idTipoPasta=$request->idTipoPasta;
        $producto-> codigo=$request->codigo;
        $producto-> cantidad=$request->cantidad;
        $producto-> precio=$request->precio;
        $producto-> peso=$request->peso;

    
        
        $producto->save();
    }
    public function destroy(Request $request){
        $producto= Producto::findOrFail($request->id);
        $producto->delete();
    }
    public function getProducto(Request $request){
        
        
$producto= Producto::select('id','nombre')
        ->get();
        return [
            'producto'=>$producto
        ];
    }


}
