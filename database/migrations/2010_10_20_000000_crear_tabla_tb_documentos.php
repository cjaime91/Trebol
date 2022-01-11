<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTbDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('factura_id');
            $table->foreign('factura_id','fk_documento_factura')->references('id')->on('tb_facturas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('tipo_doc_id');
            $table->foreign('tipo_doc_id','fk_tipo_documento')->references('id')->on('tb_tipo_doc')->onDelete('restrict')->onUpdate('restrict');
            $table->string('consecutivo_suno',10);
            $table->string('ubicacion',200);
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
        Schema::dropIfExists('tb_documentos');
    }
}
