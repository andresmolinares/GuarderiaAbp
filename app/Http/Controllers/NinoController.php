<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Nino;
use App\Models\Persona;
use App\Models\Menu;
use Illuminate\Http\Request;

class NinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ninos = Nino::with("persona")->paginate(5);
        

        return view('niño.index', compact('ninos'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personas = Persona::all();
        $menus = Menu::all();
        return view('niño.create', compact('personas', 'menus'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha_ingreso'=>'required|date',
            //'comidas_realizadas'=>'required|int|max:100',
            //'fecha_baja'=>'required|string|max:100',
            'persona_id'=>'required|string|max:100',
            'menu_id'=>'required|int|max:20'




        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        
        $datosNiño = request()->except('_token');
        Nino::insert($datosNiño);

        return redirect()->route('nino.index')->with('mensaje', 'Niño agregado con éxito');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nino  $nino
     * @return \Illuminate\Http\Response
     */
    public function show(Nino $nino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nino  $nino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $niño=Nino::findOrFail($id);
        $personas = Persona::all();
        $menus = Menu::all();
        return view('niño.edit', compact('niño', 'personas', 'menus'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nino  $nino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nino $nino)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha_ingreso'=>'required|date',
            //'comidas_realizadas'=>'required|int|max:100',
            //'fecha_baja'=>'required|string|max:100',
            'persona_id'=>'required|string|max:100',
            'menu_id'=>'required|int|max:20'




        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        
        //
        //$datosNiño = request()->except(['_token','_method']);
        //Nino::where('id','=',$id)->update($datosNiño);

        //$niño=Nino::findOrFail($nino->id);

        //nino->update($request()->except(['_token','_method']));
        Nino::UpdateOrCreate(["id" => $nino->id], $request->all());
        return redirect()->route('nino.index', ['nino' => $nino->id])->with('mensaje', 'Niño actualizado con éxito');
        //return view('niño.edit', compact('niño'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nino  $nino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nino $nino)
    {
        $nino->delete();
        return redirect()->route('nino.index')->with('mensaje', 'Niño eliminado con éxito');
    }
}
