<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTbLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('factura_id');
            $table->foreign('factura_id','fk_log_factura')->references('id')->on('tb_facturas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id','fk_log_usuario')->references('id')->on('tb_usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('estado_prev_id');
            $table->foreign('estado_prev_id','fk_log_estado_prev')->references('id')->on('tb_estados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('estado_post_id');
            $table->foreign('estado_post_id','fk_log_estado_post')->references('id')->on('tb_estados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('comentario',200);
            $table->tinyInteger('aprobacion');
            $table->tinyInteger('revision');
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
        Schema::dropIfExists('tb_logs');
    }
}
