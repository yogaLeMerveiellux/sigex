<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table='alumnos';
    protected $guarded=[];

    public function scopeName($query, $name)
    {
        if (trim($name) !='') {
        $query->where('alumnos.nombre', 'LIKE' , '%'.$name.'%')
        ->orWhere('alumnos.aPaterno', 'LIKE' , '%'.$name.'%')
        ->orWhere('aMaterno', 'LIKE' , '%'.$name.'%')
        ;
        }
        
    }   

    public function scopeType($query, $status)
     {
         $estado=\Request::get('selectActivo');
         $actividad=\Request::get('selectActividad');
         
         if ($estado != '') {
             $query->where('alumnos.activo', $status);
         }
         if ($actividad!='') {
             $query->where('alumnos.idCurricular', $actividad);
         }
     } 



}
