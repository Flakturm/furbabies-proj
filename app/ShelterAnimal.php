<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShelterAnimal extends Model
{
    protected $fillable = [
        'animal_id',
        'subid',
        'shelter_pkid',
        'place',
        'kind',
        'sex',
        'bodytype',
        'colour',
        'age',
        'sterilization',
        'bacterin',
        'foundplace',
        'title',
        'status',
        'remark',
        'caption',
        'opendate',
        'closeddate',
        'update',
        'createtime',
        'album_file',
        'image_checked'
    ];

    public function shelter()
    {
        return $this->belongsTo('App\Shelter');
    }
}
