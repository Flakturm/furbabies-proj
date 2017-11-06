<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShelterController extends Controller
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
        $animals = ShelterAnimal::with('shelter.area')
                                ->orderBy('update', 'desc')
                                ->get()
                                ->take(5);

        return view('frontend.index', compact('animals'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $name )
    {
        $animals = Cache::remember('shelterAnimals', config('cache.time'), function () use ( $id ) {
            return ShelterAnimal::with('shelter.area')
                                ->where('id', '=', $id)
                                ->first();
        });
        return view('frontend.shelteranimal', compact('animals'));
    }
}
