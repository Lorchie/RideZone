<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\spot;
use Illuminate\Support\Facades\DB;

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

      protected function getFilterSpotForMap(Request $request){
            $familleLabel = $request->familleLabel;
            $familleValue = $request->familleValue;
            $typePlageLabel = $request->typePlageLabel;
            $typePlageValue = $request->typePlageValue;
            $frequentationLabel = $request->frequentationLabel;
            $frequentationValue = $request->frequentationValue;

            $spot = DB::table('spot')
                ->where($familleLabel, $familleValue)
                ->whereIn($typePlageLabel, $typePlageValue)
                ->whereIn($frequentationLabel,$frequentationValue)
                ->get();
              return $spot;
      }
}
