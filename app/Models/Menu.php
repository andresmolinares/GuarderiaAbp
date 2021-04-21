<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'nombre'

    ];

    public function nino(){
        return $this->hasMany(Nino::class);
    }

    public function plato(){
        return $this->hasMany(Plato::class);
    }

    
    
}
