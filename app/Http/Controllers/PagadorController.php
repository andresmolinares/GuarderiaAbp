<?php

namespace App\Http\Controllers;

use App\Models\Pagador;
use Illuminate\Http\Request;

class PagadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagadores = Pagador::with("persona")->paginate(5);
        
        return view('pagador.index', compact('pagadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pagador.create');
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
            'numero_cuenta'=>'required|string|max:100',
            'banco'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosPagador = request()->except('_token');
        Pagador::insert($datosPagador);

        return redirect()->route('pagador.index')->with('mensaje', 'Pagador agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagador  $pagador
     * @return \Illuminate\Http\Response
     */
    public function show(Pagador $pagador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagador  $pagador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pagador=Pagador::findOrFail($id);

        return view('pagador.edit', compact('pagador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pagador  $pagador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagador $pagador)
    {
        //
        $campos=[
            'id'=>'required|string|max:100',
            'numero_cuenta'=>'required|string|max:100',
            'banco'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        Pagador::UpdateOrCreate(["id" => $pagador->id], $request->all());
        return redirect()->route('pagador.index', ['pagador' => $pagador->id])->with('mensaje', 'Pagador actualizado con éxito');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagador  $pagador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagador $pagador)
    {
        //
        $pagador->delete();
        return redirect()->route('pagador.index')->with('mensaje', 'Pagador eliminado con éxito');
    }
}
