<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shelter;
use Cache;

class ShelterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get a list of Shelters
        $shelters = Cache::remember('shelters', config('cache.time'), function () {
            return Shelter::all();
        });

        return view('frontend.shelterlist', compact('shelters'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show( $name )
    {
        $shelter = Cache::remember('shelter_' . $name, config('cache.time'), function () use ( $name ) {
            return Shelter::where('name', '=', $name)
                          ->first();
        });
        return view('frontend.shelter', compact('shelter'));
    }
}
