<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Cliente extends Model
{

    //use HasFactory;
    use SoftDeletes; //Implementamos 
    protected $table ="cliente";
    protected $primaryKey = "email";
    protected $keyType = 'string';
    protected $fillable = ['nombre','apellidos','telefono','direccion','foto','update_at','create_at','deleted_at'];


    public function listaviaje(){
    	return $this->hasMany('App\Models\ListaViaje','email');
    }

}
