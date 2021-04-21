<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nino extends Model
{
    use HasFactory;
    
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ninos'; //Nombre de la tabla que va a gestionar este Modelo

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'fecha_ingreso',
        'comidas_realizadas',
        'fecha_baja',
        'persona_id',
        'menu_id'
    ]; //Nombre de las columnas que tiene la tabala

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha_ingreso' => 'date:d/m/Y',
        'fecha_baja' => 'date:d/m/Y'
    ]; //Esto te va a servir para darle el formato que desees

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'fecha_ingreso', 'fecha_baja'];

    /**
     * Get the persona that owns the Nino
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
        
    }

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function ingrediente(){
        return $this->hasMany(Ingrediente::class);
    }

    public function cuota_mensual(){
        return $this->hasMany(Cuota_mensual::class);
    }
}


