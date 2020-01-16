<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = "categorias";
    protected $fillable = ['id', 'nombre', 'descripcion'];
	public $timestamps = true;

    public function productos(){
        return $this->hasMany(Productos::class, 'id_categoria'); 
	}
}
