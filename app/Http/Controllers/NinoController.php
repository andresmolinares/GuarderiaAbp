<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Nino;
use App\Models\Persona;
use App\Models\Menu;
use PDF;
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

    // Inicio para generacion de reportes PDF
    public function reporte_bajas(){
        $ninos=Nino::whereNotNull('fecha_baja')->get();
        $fecha=date('Y-m-d');
        $data=compact('ninos', 'fecha');
        $pdf=PDF::loadView('reports.reporte_bajas', $data);

        //return $pdf->setPaper('a4', 'landscape')->stream();
        return $pdf->setPaper('a4', 'landscape')->download('retirados_'.time().'.pdf');
    }

    public function reporte_mensualidad(){
        $ninos=DB::table('ninos')
        ->join('cuota_mensuales','ninos.id', 'cuota_mensuales.niño_id')
        ->selectRaw('ninos.nombre AS ninos_nombre, ninos.comidas_realizadas, cuota_mensuales.valor_mensualidad AS cargo_mensual,cuota_mensuales.costo_comida, (cuota_mensuales.costo_comida * ninos.comidas_realizadas) as total_comidas , (cuota_mensuales.costo_comida * ninos.comidas_realizadas) + cuota_mensuales.valor_mensualidad AS total_mensualidad ')
        ->get();
        
        $data=compact('ninos');
        $pdf=PDF::loadView('reports.reporte_mensualidad', $data);
        return $pdf->setPaper('a4', 'landscape')->download('mensualidades_'.time().'.pdf');
        
        
    }

    public function reporte_menus_favoritos(){
        $ninos=DB::table('ninos')
        ->join('menus', 'ninos.menu_id', 'menus.id')
        ->selectRaw('COUNT(ninos.id) as cantidad_niños, menus.nombre as nombre_menu')
        ->groupby('ninos.menu_id')
        ->get();

        $data=compact('ninos');
        $pdf=PDF::loadView('reports.reporte_menus_favoritos', $data);
        return $pdf->setPaper('a4', 'landscape')->download('menusfavoritos_'.time().'.pdf');

    }


    //Fin reportes



    // PASAR A MODELO
    // PATRON DE DISEÑO ADO o DAO


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
