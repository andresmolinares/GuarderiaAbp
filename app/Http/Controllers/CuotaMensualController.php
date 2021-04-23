<?php

namespace App\Http\Controllers;

use App\Models\Cuota_mensual;
use App\Models\Pagador;
use App\Models\Nino;
use Illuminate\Http\Request;

class CuotaMensualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cuota_mensuales = Cuota_mensual::with("pagador")->paginate(5);
        
        return view('cuota_mensual.index', compact('cuota_mensuales'));
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
        $pagadores = Pagador::all();
        return view('cuota_mensual.create', compact('ninos', 'pagadores'));

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
            'valor_mensualidad'=>'required|string|max:100',
            'costo_comida'=>'required|string|max:100',
            'pagador_id'=>'required|string|max:100',
            'niño_id'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosCuotaMensual = request()->except('_token');
        Cuota_mensual::insert($datosCuotaMensual);

        return redirect()->route('cuota_mensual.index')->with('mensaje', 'Cuota Mensual agregada con éxito');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuota_mensual  $cuota_mensual
     * @return \Illuminate\Http\Response
     */
    public function show(Cuota_mensual $cuota_mensual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuota_mensual  $cuota_mensual
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cuota_mensual=Cuota_mensual::findOrFail($id);
        $ninos = Nino::all();
        $pagadores = Pagador::all();
        return view('cuota_mensual.edit', compact('cuota_mensual', 'ninos', 'pagadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuota_mensual  $cuota_mensual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuota_mensual $cuota_mensual)
    {
        //
        $campos=[
            'valor_mensualidad'=>'required|string|max:100',
            'costo_comida'=>'required|string|max:100',
            'pagador_id'=>'required|int',
            'niño_id'=>'required|int'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        Cuota_mensual::UpdateOrCreate(["id" => $cuota_mensual->id], $request->all());
        return redirect()->route('cuota_mensual.index', ['cuota_mensual' => $cuota_mensual->id])->with('mensaje', 'Cuota Mensual actualizada con éxito');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuota_mensual  $cuota_mensual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuota_mensual $cuota_mensual)
    {
        //
        $cuota_mensual->delete();
        return redirect()->route('cuota_mensual.index')->with('mensaje', 'Cuota mensual eliminada con éxito');
    }
}
