<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['note','user_id','ticket_id'];

    public function ticket_id()
    {
        return $this->belongsTo('App\Model\Ticket');
    }
}
