<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\spot;
use DB;

class SpotController extends Controller
{
      protected function create(Request $request)
      {
        $user = Auth::user();

        $nameSpot = $request->input('nameSpot');
        $descriptionSpot = $request->input('descriptionSpot');
        $typePlage =  $request->input('typePlage');
        $frequentationSpot = $request->input('frequentationSpot');
        $dangerSpot = $request->input('dangerSpot');
        $interdictionSpot = $request->input('interdictionSpot');
        $parkingSpot = $request->input('interdictionSpot');
        $lat = $request->input('lat');
        $long = $request->input('long');

        $id = Auth::id();
    
        if ($_FILES['photoSpot'] > 0) $erreur = "Erreur lors du transfert";

        if($request->hasFile('photoSpot'))
        {
            $path = $request->photoSpot->store('imagesSpots');
          
        }

        
        echo ($id);

        $test = DB::table('spot')->insert(
          [
            'nom' => $nameSpot,
            'description' => $descriptionSpot,
            'photo' => $path,
            'typePlage' => $typePlage,
            'interdiction' => $interdictionSpot,
            'famille' => 0,
            'frequentation' => $frequentationSpot,
            'danger' => $dangerSpot,
            'accesParking' => $parkingSpot,
            'longitude' => $long,
            'latitude' => $lat,
            'valider' => 'aVerifier',
            'user_id' => $id

          ]
        );

        return "fgd";
        
       
      }

      protected function getSpotForMap(){
          $spot=spot::all();
          return $spot;
      }
}
