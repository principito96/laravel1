<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellidos','email','localidad'];

    public function asignatura(){
        return $this->hasMany(Asignaturas::class);
    }

    public static function getArrayIdNombre(){
        $profesore=Profesores::orderBy('nombre')->get();
        $miArray=[];
        foreach($profesore as $item){
            $miArray[$item->id]=$item->nombre;
        }
        return $miArray;
    }
}
