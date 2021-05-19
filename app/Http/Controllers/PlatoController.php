<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $platos = Plato::with("menu")->paginate(5);
        
        return view('plato.index', compact('platos'));
    }

    //Inicio Reporte

    public function reporte_platos(){
        $platos = DB::table('platos')
        ->join('menus', 'platos.menu_id', 'menus.id')
        ->selectRaw('menus.nombre as nombre_menu, COUNT(platos.menu_id) as total_platos')
        ->groupby('platos.menu_id')->get();

        $data=compact('platos');
        $pdf=PDF::loadView('reports.reporte_platos', $data);

        return $pdf->setPaper('a4', 'landscape')->download('platosxmenu_'.time().'.pdf');

    }

    //Fin reporte


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menus = Menu::all();
        return view('plato.create', compact('menus'));
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
            'nombre'=>'required|string|max:100',
            'cantidad'=>'required|int|max:100',
            'descripcion'=>'required|string|max:100',
            'menu_id'=>'required|int|max:20'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosPlato = request()->except('_token');
        Plato::insert($datosPlato);

        return redirect()->route('plato.index')->with('mensaje', 'Plato agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show(Plato $plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plato=Plato::findOrFail($id);
        $menus = Menu::all();
        return view('plato.edit', compact('plato', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        //
        $campos=[
            'nombre'=>'required|string|max:100',
            'cantidad'=>'required|int|max:100',
            'descripcion'=>'required|string|max:100',
            'menu_id'=>'required|int|max:20'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        Plato::UpdateOrCreate(["id" => $plato->id], $request->all());
        return redirect()->route('plato.index', ['plato' => $plato->id])->with('mensaje', 'Plato actualizado con éxito');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        //
        
        $plato->delete();
        return redirect()->route('plato.index')->with('mensaje', 'Plato eliminado con éxito');
    
    }
}
