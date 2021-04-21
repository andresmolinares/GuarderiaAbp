<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
