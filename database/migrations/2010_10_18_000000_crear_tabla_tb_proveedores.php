<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTbProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit',20);
            $table->string('razon_social',170);
            $table->string('correo',75)->nullable();
            $table->string('direccion',150)->nullable();
            $table->string('telefono',12)->nullable();
            $table->unsignedInteger('tipo_factura_id');
            $table->foreign('tipo_factura_id','fk_tipo_factura_proveedor')->references('id')->on('tb_tipo_factura')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('area_id');
            $table->foreign('area_id','fk_area_proveedor')->references('id')->on('tb_areas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('tb_proveedores');
    }
}
