<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShelterAnimal;
use Cache;

class ImageController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $shelterAnimal = ShelterAnimal::find( $request->id );
        $shelterAnimal->album_file = asset('images/nophoto.jpg');
        $shelterAnimal->save();

        Cache::forget('shelteranimals_page_' . $request->page);
        return response()->json(['message' => $request->id . ' album_file wiped.']);
    }
}
