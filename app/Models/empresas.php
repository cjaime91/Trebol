<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    use HasFactory;
    protected $table = "tb_empresas";
    protected $fillable = ['empresa'];
    protected $primaryKey ='id';
}
