<?php

namespace App\Http\Controllers\Supervisores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\CoordenadasEvent;

class CoordenadasController extends Controller
{
    public function sendCoordenadas(Request $request){

        $data = $request->only(['coor_lat','coor_lng']);

        event(new CoordenadasEvent($data));

        return response()->json([
            'ok' => true,
            'mensaje' => 'Mensaje enviado Correctamente'
        ]);
    }
}
