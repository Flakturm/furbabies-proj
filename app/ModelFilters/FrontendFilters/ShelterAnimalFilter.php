<?php

namespace App\ModelFilters\FrontendFilters;
use EloquentFilter\ModelFilter;

class ShelterAnimalFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function area( $id )
    {
        if ( $id < 1 )
        {
            return null;
        }
        $ids = \App\Shelter::where('area_id', $id)->pluck('id')->toArray();
        return $this->whereIn('shelter_pkid', $ids);
    }

    public function shelter( $id )
    {
        return $id ? $this->where('shelter_pkid', $id) : null;
    }

    public function kind( $kind )
    {
        return $kind ? $this->where('kind', $kind) : null;
    }

    public function sex( $sex )
    {
        return $sex ? $this->where('sex', $sex) : null;
    }

    public function age( $age )
    {
        return $age ? $this->where('age', $age) : null;
    }

    public function bodytype( $bodytype )
    {
        return $bodytype ? $this->where('bodytype', $bodytype) : null;
    }

    public function sterilisation( $sterilisation )
    {
        return $sterilisation ? $this->where('sterilisation', $sterilisation) : null;
    }
}
