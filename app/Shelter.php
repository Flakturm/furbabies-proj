<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function animals()
    {
        return $this->hasMany('App\ShelterAnimal', 'shelter_pkid');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
