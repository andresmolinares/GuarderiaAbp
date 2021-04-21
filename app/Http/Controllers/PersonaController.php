<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personas = Persona::paginate(5);
        return view('persona.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('persona.create');
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
        $campos=[
            'id'=>'required|string|max:100',
            'nombre'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'telefono'=>'required|string|max:100',
            'parentezco'=>'required|string|max:100'
            




        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosPersona = request()->except('_token');
        Persona::insert($datosPersona);

        return redirect()->route('persona.index')->with('mensaje', 'Persona agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $persona=Persona::findOrFail($id);

        return view('persona.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
        $campos=[
            'id'=>'required|string|max:100',
            'nombre'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'telefono'=>'required|string|max:100',
            'parentezco'=>'required|string|max:100'
            




        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        Persona::UpdateOrCreate(["id" => $persona->id], $request->all());
        return redirect()->route('persona.index', ['persona' => $persona->id])->with('mensaje', 'Niño actualizado con éxito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
        $persona->delete();
        return redirect()->route('persona.index')->with('mensaje', 'Persona eliminada con éxito');
    }
}
