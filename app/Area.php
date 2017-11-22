<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'id', 'name',
    ];

    public function Shelters()
    {
        return $this->hasMany('App\Shelter');
    }
}
