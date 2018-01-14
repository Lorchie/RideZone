<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\spot;

class SpotController extends Controller
{

      protected function create(Request $request)
      {
        $nameSpot = $request->input('nameSpot');
        $descriptionSpot = $request->input('descriptionSpot');
        $typePlage =  $request->input('typePlage');
        $frequentationSpot = $request->input('frequentationSpot');
        $dangerSpot = $request->input('dangerSpot');
        $interdictionSpot = $request->input('interdictionSpot');
        $parkingSpot = $request->input('interdictionSpot');

        echo $request->input('lat');;

        return "lol";
      }

      protected function getSpotForMap(){
          $spot=spot::all();
          return $spot;
      }
}
