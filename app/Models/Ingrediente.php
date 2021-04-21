<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    protected $table = 'ingredientes'; 

    protected $fillable = [
        'nombre',
        'fecha_caducidad',
        'niño_id',
        'plato_id'
        
    ];

    protected $casts = [
        'fecha_caducidad' => 'date:d/m/Y'
    ]; 

    public function nino()
    {
        return $this->belongsTo(Nino::class, 'niño_id', 'id');
    }

    public function plato(){
        return $this->belongsTo(Plato::class, 'plato_id', 'id');

    }


}
