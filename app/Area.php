<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function Shelter()
    {
        return $this->hasOne('App\Shelter');
    }
}
