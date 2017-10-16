<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\v1\ShelterAnimalController as ApiShelterAnimalController;
use Illuminate\Http\Request;

class ShelterAnimalController extends Controller
{
    private $api_shelter_animal_controller;

    public function __construct(ApiShelterAnimalController $api)
    {
        $this->api_shelter_animal_controller = $api;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get list of random animals from api
        $request = $this->api_shelter_animal_controller->index();

        $animals = json_decode( $request );

        return view('frontend.index')->with('animals', $animals);
    }
}
