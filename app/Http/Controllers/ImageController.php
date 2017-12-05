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
            return response()->json('Something is wrong with this id. ID#' . $request->id);
        }
        else
        {
            $shelterAnimal->album_file = asset('images/nophoto.jpg');
            $shelterAnimal->save();

            if ( $request->page )
            {
                Cache::forget('shelteranimals_page_' . $request->page);
            }

            return response()->json(['message' => $request->id . ' album_file wiped.']);
        }
    }
}
