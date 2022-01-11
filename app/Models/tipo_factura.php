<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_factura extends Model
{
    use HasFactory;
    protected $table = "tb_tipo_factura";
    protected $fillable = ['tipo_factura'];
    protected $primaryKey ='id';
}
