<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagador extends Model
{
    use HasFactory;

    protected $table = 'pagadores';
    protected $fillable = [
        'id',
        'numero_cuenta',
        'banco',
    ];

    public function persona(){
        return $this->belongsTo(Persona::class, 'id', 'id');
    }


}
