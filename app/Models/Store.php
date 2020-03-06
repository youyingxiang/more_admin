<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $table = 'store';

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
