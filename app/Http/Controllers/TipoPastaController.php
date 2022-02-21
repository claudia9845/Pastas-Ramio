<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipoPasta;
use Inertia\Inertia;



class TipoPastaController extends Controller
{
    //
    public function store(Request $request){
        $tipoPasta= new TipoPasta();
        $tipoPasta-> nombre=$request->nombre;
        

        $tipoPasta->save();
    }

    //
    public function index(){
        $tipoPasta=TipoPasta::all();
        return Inertia::render('TipoPasta',['pasta'=>$tipoPasta]);
        
       // return ['pasta'=>$tipoPasta];
    }
    public function indexData(){
        $tipoPasta=TipoPasta::all();
        
        return ['TipoPasta'=>$tipoPasta];
    }
public function update(Request $request){
        $tipoPasta= TipoPasta::findOrFail($request->id);
        $tipoPasta-> nombre=$request->nombre;
    
        
        $tipoPasta->save();
    }
    public function destroy(Request $request){
        $tipoPasta= TipoPasta::findOrFail($request->id);
        $tipoPasta->delete();
    }
    public function getCategoria(Request $request){
        
        
$tipoPasta= TipoPasta::select('id','nombre')
        ->get();
        return [
            'Pasta'=>$tipoPasta
        ];
    }
}
