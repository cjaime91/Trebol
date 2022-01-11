<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentos extends Model
{
    use HasFactory;
    protected $table = "tb_documentos";
    protected $fillable = [
        'factura_id', 'tipo_doc_id', 'consecutivo_suno', 'ubicacion'
    ];
    protected $primaryKey = 'id';
}
