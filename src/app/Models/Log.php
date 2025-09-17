<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $fillable=[
        "event_id",
        "spot_id",
        "operation_type",
        //created_atあるからいらない
    ];
    public function  event()
    {
            return $this->belongsTo(Event::class,"event_id");
    }
    public function spot()
    {
            return $this->belongsTo(Spot::class,"spot_id");
    }
}
