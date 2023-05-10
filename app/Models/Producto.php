<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    //protected $primaryKey = 'cod_evento';
    //public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        "nombre",
        "referencia",
        "precio",
        "peso",
        "categoria",
        "stock",
    ];

}
