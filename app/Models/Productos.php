<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = "productos";
    protected $fillable = ['id', 'nombre', 'descripcion', 'imagen', 'precio', 'descuento', 'id_categoria'];
	public $timestamps = true;

	public function categoria(){
        return $this->belongsTo(Categorias::class, 'id_categoria'); 
	}
}
