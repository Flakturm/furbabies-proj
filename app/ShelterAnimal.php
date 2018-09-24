<?php

namespace App;

use App\Traits\Enums;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class ShelterAnimal extends Model
{
    use Enums;
    use Filterable;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at'
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

    public function modelFilter()
    {
        return $this->provideFilter(ModelFilters\FrontendFilters\ShelterAnimalFilter::class);
    }

    public function shelter()
    {
        return $this->belongsTo('App\Shelter', 'shelter_pkid');
    }

    public function getBadgeStatusAttribute()
    {
        return $this->status == 'open' ? 'success' : ($this->status == 'dead' ? 'danger' : 'secondary');
    }
}
