<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShelterAnimal;
use Cache;

class ShelterAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ini_set('memory_limit','256M');
        // get a list of random animals
        $animals = ShelterAnimal::with('shelter:id,name')
                                ->orderBy('update', 'desc')
                                ->get()
                                ->take(8);

        return view('frontend.index', compact('animals'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $animals = Cache::remember('shelterAnimals', config('cache.time'), function () use ( $id ) {
            return ShelterAnimal::with('shelter.area')
                                ->where('id', '=', $id)
                                ->first();
        });
        return view('frontend.shelteranimal', compact('animals'));
    }

    public function showAnimalsByShelter( $name )
    {
        $animals = Cache::remember('animalsByShelter', config('cache.time'), function () use ( $name ) {
            return ShelterAnimal::with('shelter.area')
                                ->whereHas('shelter', function ( $query ) use ( $name ) {
                                    $query->where('name', '=', $name);
                                })
                                ->get();
        });
        return view('frontend.list', compact('animals'));
    }
}
