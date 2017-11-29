<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShelterAnimal;
use Cache;

class ShelterAnimalController extends Controller
{
    /**
     * Display a resultsing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ini_set('memory_limit','256M');
        // get latest animals
        $animals = Cache::remember('shelteranimals_latest', config('cache.time'), function () {
            return ShelterAnimal::with('shelter.area')
                                  ->orderBy('update', 'desc')
                                  ->get()
                                  ->take(5);
        });

        return view('frontend.index', compact('animals'));
    }

    public function all( Request $request )
    {
        $page = $request->has('page') ? $request->query('page') : 1;

        $animals = Cache::remember('shelteranimals_page_' . $page, config('cache.time'), function () {
            return ShelterAnimal::with('shelter.area')
                                ->orderBy('update', 'desc')
                                ->paginate(20);
        });

        $total = ShelterAnimal::with('shelter.area')
                              ->orderBy('update', 'desc')
                              ->count();

        return view('frontend.shelteranimal.results', compact('animals', 'total'));
    }

    public function filter( Request $request )
    {
        $query = $request->all();
        if ( count( $query ) < 1 )
        {
            return abort(404);
        }

        $animals = ShelterAnimal::with('shelter.area')->filter( $query )->paginateFilter(20);
        $total = ShelterAnimal::with('shelter.area')->filter( $query )->count();

        return view('frontend.shelteranimal.results', compact('animals', 'query', 'total'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $animal = Cache::remember('shelteranimal_' . $id, config('cache.time'), function () use ( $id ) {
            return ShelterAnimal::with('shelter.area')
                                ->where('id', '=', $id)
                                ->first();
        });

        return view('frontend.shelteranimal.single', compact('animal'));
    }

    public function showAnimalsByShelter( $name )
    {
        $animals = Cache::remember('animalsbyshelter_' . $name, config('cache.time'), function () use ( $name ) {
            return ShelterAnimal::with('shelter.area')
                                ->whereHas('shelter', function ( $query ) use ( $name ) {
                                    $query->where('name', '=', $name);
                                })
                                ->get();
        });

        return view('frontend.shelteranimal.results', compact('animals'));
    }
}
