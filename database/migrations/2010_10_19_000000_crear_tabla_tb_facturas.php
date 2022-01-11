<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTbFacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_factura',30);
            $table->date('recibida');
            $table->date('generada');
            $table->date('vencimiento');
            $table->date('fecha_pago');
            $table->double('valor',20,2);
            $table->unsignedInteger('proveedor_id');
            $table->foreign('proveedor_id','fk_proveedor_factura')->references('id')->on('tb_proveedores')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('area_gestion_id');
            $table->foreign('area_gestion_id','fk_area_gestion_factura')->references('id')->on('tb_areas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id','fk_empresa_factura')->references('id')->on('tb_empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->tinyInteger('anticipo_vt');
            $table->tinyInteger('anticipo_mv');
            $table->string('radicado',10);
            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id','fk_estado_factura')->references('id')->on('tb_estados')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('tb_facturas');
    }
}
