<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShelterAnimal;
use Cache;
use Cookie;

class ShelterAnimalController extends Controller
{
    private $shelterAnimal;

    public function __construct(ShelterAnimal $shelterAnimal)
    {
        $this->shelterAnimal = $shelterAnimal;
    }

    public function index()
    {
        // get latest animals
        $animals = $this->shelterAnimal->with('shelter.area')
                                       ->orderBy('update', 'desc')
                                       ->paginate(5)
                                       ->take(5);

        session()->forget('result_page');

        return view('frontend.index', compact('animals'));
    }

    public function all()
    {
        $page = request()->has('page') ? request('page') : 1;

        $animals = Cache::remember('shelteranimals_page_' . $page, config('cache.time'), function () {
            return $this->shelterAnimal->with('shelter.area')
                                       ->orderBy('update', 'desc')
                                       ->paginate(20);
        });

        $count = $animals->total();

        // session()->put('result_page', url()->full());
        // Cookie::queue(Cookie::make('result_page', url()->full(), 60));
        // Cookie::queue('result_page', url()->full(), 60);
        // Cookie::queue(Cookie::make('CookieName', 'CookieValue', 60));
        // cookie(
        //     'test_basic',
        //     'The cookie value'
        // );

        return view('frontend.shelteranimal.results', compact('animals', 'count'))->withCookie(Cookie::make('result_page', url()->full(), 60));
    }

    public function filter()
    {
        $query = request()->all();
        if ( count( $query ) < 1 )
        {
            return abort(404);
        }

        $url = request()->url();

        ksort($query);

        $queryString = http_build_query($query);

        $fullUrl = "{$url}?{$queryString}";

        $rememberKey = sha1($fullUrl);

        $animals = Cache::remember($rememberKey, config('cache.time'), function () use ( $query ) {
            return $this->shelterAnimal->with('shelter.area')
                                       ->filter( $query )
                                       ->orderBy('update', 'desc')
                                       ->paginateFilter(20);
        });
        $count = $animals->total();

        // save results url to session
        // request()->session()->put('result_page', url()->full());
        // session(['__previous' => 'abc']);
        // session(['result_page' => url()->full()]);
        // Session::put('result_page', 'abc');
        // $this->returnUrl = url()->full();

        return view('frontend.shelteranimal.results', compact('animals', 'query', 'count'));
    }

    public function show( Request $request, $id )
    {
        $animal = Cache::remember('shelteranimal_' . $id, config('cache.time'), function () use ( $id ) {
            return $this->shelterAnimal->with('shelter.area')
                                       ->where('id', '=', $id)
                                       ->orWhere('animal_id', $id)
                                       ->first();
        });

        $area_id = [];

        if (! is_null ( $animal ) )
        {
            $area_id = ['area_id' => $animal->shelter->area->id];
        }

        $rand_animals = $this->shelterAnimal->with('shelter.area')
                                            ->filter( $area_id )
                                            ->orderByRaw('RAND()')
                                            ->take(8)
                                            ->get();

        return view('frontend.shelteranimal.single', compact('animal', 'rand_animals'));
    }

    public function showAnimalsByShelter( $name )
    {
        $animals = Cache::remember('animalsbyshelter_' . $name, config('cache.time'), function () use ( $name ) {
            return $this->shelterAnimal->with('shelter.area')
                                        ->whereHas('shelter', function ( $query ) use ( $name ) {
                                            $query->where('name', '=', $name);
                                        })
                                        ->paginate(20);
        });

        $query = request()->all();
        $count = $animals->total();

        session()->put('result_page', url()->full());

        return view('frontend.shelteranimal.results', compact('animals', 'query', 'count'));
    }
}
