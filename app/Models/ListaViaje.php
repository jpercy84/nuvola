<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class ListaViaje extends Model
{
    //use HasFactory;
    use SoftDeletes; //Implementamos 
    protected $table ="lista_viajes";
    protected $primaryKey = "id_lista_viajes";
    protected $fillable = ['fecha_viaje','pais','ciudad','email','created_at','deleted_at','updated_at'];

    public function cliente(){
    	return $this->belongsTo('App\Models\Cliente','email');
    }
}
