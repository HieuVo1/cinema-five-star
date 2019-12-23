<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_projector extends Model
{
    //
    protected $table = "type_projectors";

    public function plan_cinema()
    {
        return $this->hasMany('App\Plan_cinema','type_projector_id','id');
    }
}
