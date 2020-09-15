<?php

namespace App\Http\Controllers\Api;

use App\Events\ChatEvent;
use App\Events\DirectMensajeEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MensajeController extends Controller
{
    public function send(Request $request){

        /* Detecta quien envia el mensaje y lo ignora para el mismo */
        broadcast(new ChatEvent($request->mensaje))->toOthers();

        return response()->json([
            'ok' => true,
            'mensaje' => 'Mensaje enviado Correctamente'
        ]);
    }

    public function sendUsuario(Request $request){

        $data = $request->only(['mensaje','to']);

        event(new DirectMensajeEvent($data));


        return response()->json([
            'ok' => true,
            'mensaje' => 'Mensaje enviado Correctamente'
        ]);
    }
}
