<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plato extends Model
{
    use HasFactory;
    protected $table = 'platos'; 

    protected $fillable = [
        'nombre',
        'cantidad',
        'descripcion',
        'menu_id'
        
    ];

    public function menu()
    {

        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function ingrediente(){
        return $this->hasMany(Ingrediente::class);
    }

    //Consulta
    public function cantidad_platos()
    {
        $platos = DB::table('platos')
        ->join('menus', 'platos.menu_id', 'menus.id')
        ->selectRaw('menus.nombre as nombre_menu, COUNT(platos.menu_id) as total_platos')
        ->groupby('platos.menu_id')->get();

        return view('cantidad_platos', compact('platos'));
    }
}
