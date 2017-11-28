<?php

namespace App;

use App\Traits\Enums;
use Illuminate\Database\Eloquent\Model;

class ShelterAnimal extends Model
{
    use Enums;

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

    protected $enumKinds = [
        'dog', 'cat', 'other'
    ];

    protected $enumSexes = [
        'm', 'f', 'n'
    ];

    protected $enumBodytypes = [
        'mini', 'small', 'medium', 'big', 'other'
    ];

    protected $enumAges = [
        'child', 'adult', 'other'
    ];

    protected $enumSterilisations = [
        't', 'f', 'n'   // yes, no, unknown
    ];

    protected $enumBacterins = [
        't', 'f', 'n'   // yes, no, unknown
    ];

    protected $enumStatuses = [
        'none', 'open', 'apdopted', 'other', 'dead'
    ];

    public function shelter()
    {
        return $this->belongsTo('App\Shelter', 'shelter_pkid');
    }
}
