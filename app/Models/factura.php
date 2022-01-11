<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $table = "tb_facturas";
    protected $fillable = [
        'no_factura', 'recibida', 'generada', 'vencimiento', 'fecha_pago', 'valor', 'proveedor_id', 'area_gestion_id',
        'empresa_id', 'anticipo_vt', 'anticipo_mv', 'radicado', 'estado_id'
    ];
    protected $primaryKey = 'id';
}
