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
        'album_file'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'update'
    ];

    public function shelter()
    {
        return $this->belongsTo('App\Shelter', 'shelter_pkid');
    }
}
