<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use Illuminate\Http\Request;

class EntregaController extends Controller
{
    public function getEntregasByCpf($cpf): \Illuminate\Http\JsonResponse
    {
        $entregas = Entrega::where('cpf', $cpf)->with('transportadora')->get();

        if ($entregas->isEmpty()) {
            return response()->json(['message' => 'No deliveries found for the provided CPF'], 404);
        }

        return response()->json($entregas, 200);
    }
}
