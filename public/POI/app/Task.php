<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	//

	//Using accessors
	public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
	
	public function getSurnameAttribute($value)
    {
        return ucfirst($value);
    }
	
	public function getNationalityAttribute($value)
    {
        return ucfirst($value);
    }
	
	//Using mutators
	public function setFirstNameAttribute($value)
    {
        $this->attributes['FIRST_NAME'] = ucfirst($value);
    }
	
	public function setSurnameAttribute($value)
    {
        $this->attributes['SURNAME'] = ucfirst($value);
    }
	
	public function setNationalityAttribute($value)
    {
        $this->attributes['NATIONALITY'] = ucfirst($value);
    }

}
