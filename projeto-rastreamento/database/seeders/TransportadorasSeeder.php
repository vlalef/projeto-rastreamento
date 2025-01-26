<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TransportadorasSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(database_path('seeders/json/API_LISTAGEM_TRANSPORTADORAS.json'));
        $data = json_decode($json, true)['data'];

        foreach ($data as $transportadora) {
            DB::table('transportadoras')->insert([
                'id' => $transportadora['id'],
                'cnpj' => $transportadora['cnpj'],
                'fantasia' => $transportadora['fantasia'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
