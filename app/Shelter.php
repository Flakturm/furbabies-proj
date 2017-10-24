<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    public function animals()
    {
        return $this->hasMany('App\ShelterAnimal', 'shelter_pkid');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}