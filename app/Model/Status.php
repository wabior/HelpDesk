<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
