<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    use HasFactory;
    protected $table = "tb_proveedores";
    protected $fillable = ['nit','razon_social','correo','direccion','telefono','tipo_factura_id','area_id'];
    protected $primaryKey ='id';
}
