<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table='estados';
    protected $guarded=[];

    public function scopeName($query, $name)
    {
    	if (trim($name) !='') {
    	$query->where('nombre', 'LIKE' , '%'.$name.'%');
    	}
    	
    }


    
}
