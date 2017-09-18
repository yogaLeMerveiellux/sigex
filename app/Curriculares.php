<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Curriculares extends Model
{
protected $table='curriculares';
protected $guarded=[];

public function scopeName($query, $name)
{
	if (trim($name) !='') {
	$query->where('nombre', 'LIKE' , '%'.$name.'%');
	}
	
}
}