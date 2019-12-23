<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = "rooms";

    public function cinema() {
        return $this->belongsTo('App\Cinema', 'cinema_id', 'id');
    }

    public function view()
    {
        return $this->belongsTo('App\View_room','view_id','id');
    }
}
