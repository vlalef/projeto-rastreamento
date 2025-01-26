<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EntregasSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(database_path('seeders/json/API_LISTAGEM_ENTREGAS.json'));
        $data = json_decode($json, true)['data'];

        foreach ($data as $entrega) {
            DB::table('entregas')->insert([
                'id' => $entrega['id'],
                'id_transportadora' => $entrega['id_transportadora'],
                'volumes' => $entrega['volumes'],
                'remetente' => json_encode($entrega['remetente']),
                'destinatario' => json_encode($entrega['destinatario']),
                'rastreamento' => json_encode($entrega['rastreamento']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
