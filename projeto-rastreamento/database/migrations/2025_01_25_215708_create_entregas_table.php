<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_transportadora');
            $table->integer('volumes');
            $table->json('remetente');
            $table->json('destinatario');
            $table->json('rastreamento');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entregas');
    }
};
