<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota_mensual extends Model
{
    use HasFactory;

    protected $table = 'cuota_mensuales';

    protected $fillable = [
        'valor_mensualidad',
        'costo_comida',
        'niño_id',
        'pagador_id'
    ]; 

    public function nino()
    {
        return $this->belongsTo(Nino::class, 'niño_id', 'id');
        
    }

    public function pagador(){
        return $this->belongsTo(Pagador::class, 'pagador_id', 'id');
    }


}
