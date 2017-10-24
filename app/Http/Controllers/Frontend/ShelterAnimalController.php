<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShelterAnimal;

class ShelterAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get list of random animals from api
        $results = ShelterAnimal::get()->random(12);

        return view('frontend.index')->with('animals', $results);
    }
}
