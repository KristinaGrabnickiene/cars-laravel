<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Owner;

class Car extends Model
{
    protected $table = "cars";

    public function owners() {

      	return $this->hasMany('App\Owner', 'cars_id', 'id');
}
}

