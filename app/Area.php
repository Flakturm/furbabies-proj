<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function shelters()
    {
        return $this->hasMany('App\Shelter');
    }
}
