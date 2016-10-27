<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
   
   public  function  listprovinces (){
	   
     return $this->hasMany('App\Universities');
	   
   }
}
