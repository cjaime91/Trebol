<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTbCorreos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_correos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('factura_id');
            $table->foreign('factura_id','fk_correos_factura')->references('id')->on('tb_facturas')->onDelete('restrict')->onUpdate('restrict');
            $table->tinyInteger('enviado');
            $table->dateTime('fecha_h_envio');
            $table->string('destinatarios',255);
            $table->string('asunto',150);
            $table->string('mensaje',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_correos');
    }
}
