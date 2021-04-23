<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Nino;
use App\Models\Plato;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ingredientes = Ingrediente::with("plato")->paginate(5);
        
        return view('ingrediente.index', compact('ingredientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ninos = Nino::all();
        $platos = plato::all();
        return view('ingrediente.create', compact('ninos', 'platos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //
         $campos=[
            'nombre'=>'required|string|max:100',
            'fecha_caducidad'=>'required|date',
            'niño_id'=>'required|int|max:20',
            'plato_id'=>'required|int|max:20'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosIngrediente = request()->except('_token');
        Ingrediente::insert($datosIngrediente);

        return redirect()->route('ingrediente.index')->with('mensaje', 'Ingrediente agregado con éxito');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function show(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ingrediente=Ingrediente::findOrFail($id);
        $ninos = Nino::all();
        $platos = plato::all();
        return view('ingrediente.edit', compact('ingrediente', 'ninos', 'platos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingrediente $ingrediente)
    {
        //
        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha_caducidad'=>'required|date',
            'niño_id'=>'required|int|max:20',
            'plato_id'=>'required|int|max:20'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        Ingrediente::UpdateOrCreate(["id" => $ingrediente->id], $request->all());
        return redirect()->route('ingrediente.index', ['ingrediente' => $ingrediente->id])->with('mensaje', 'Ingrediente actualizado con éxito');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingrediente $ingrediente)
    {
        //
        $ingrediente->delete();
        return redirect()->route('ingrediente.index')->with('mensaje', 'Ingrediente eliminado con éxito');
    }
}
