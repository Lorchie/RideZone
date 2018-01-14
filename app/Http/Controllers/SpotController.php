<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpotController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
      protected function create(Request $request)
      {
        $nameSpot = $request->input('nameSpot');
        $descriptionSpot = $request->input('descriptionSpot');
        $typePlage =  $request->input('typePlage');
        $frequentationSpot = $request->input('frequentationSpot');
        $dangerSpot = $request->input('dangerSpot');
        $interdictionSpot = $request->input('interdictionSpot');
        $parkingSpot = $request->input('interdictionSpot');
        //$pathPhoto =
        $latitude = $request->input('lat');
        $longitude = $request->input('long');
        //echo $request->input('lat');
        //echo $request->input('long');

        return view('home');
      }
}