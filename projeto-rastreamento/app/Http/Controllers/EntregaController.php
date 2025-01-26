<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use Illuminate\Http\Request;

class EntregaController extends Controller
{
    public function getEntregasByCpf($cpf): \Illuminate\Http\JsonResponse
    {
        $entregas = Entrega::where('destinatario->cpf', $cpf)
            ->with('transportadora')
            ->get();

        return response()->json($entregas);
    }
}
