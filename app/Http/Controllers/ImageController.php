<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShelterAnimal;
use Cache;

class ImageController extends Controller
{
    public function update()
    {
        $shelterAnimal = ShelterAnimal::find( request('id') );

        if ( is_null( $shelterAnimal ) )
        {
            return response()->json('Something is wrong with this ID#' . request('id'));
        }
        else
        {
            $shelterAnimal->album_file = 'images/nophoto.jpg';
            $shelterAnimal->save();

            if ( request('page') )
            {
                Cache::forget('shelteranimals_page_' . request('page'));
            }

            return response()->json(['message' => request('id') . ' album_file has been wiped.']);
        }
    }
}
