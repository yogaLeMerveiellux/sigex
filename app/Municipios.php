<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table='municipios';
    protected $guarded=[];

    public function scopeName($query, $name)
    {
    	if (trim($name) !='') {
    	$query->where('nombre', 'LIKE' , '%'.$name.'%');
    	}
    	
    }
}
