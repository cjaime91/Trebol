<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areas extends Model
{
    use HasFactory;
    protected $table = "tb_areas";
    protected $fillable = ['area'];
    protected $primaryKey ='id';
}
