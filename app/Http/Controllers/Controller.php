<?php

namespace App\Http\Controllers;
use App\Http\Controllers\NinoController;
use App\Models\Nino;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function bajas(){
        $ninos=Nino::whereNotNull('fecha_baja')->get();
        return view('bajas', compact('ninos'));
    }





}
