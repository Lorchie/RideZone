<?php

namespace App\Http\Controllers;
use App\post;
use Auth;
use Illuminate\Http\Request;
use App\spot;
use DB;


class SpotController extends Controller
{
      protected function create(Request $request)
      {
        $user = Auth::user();

        $validatedData = $request->validate([
          'nom' => 'required|unique:spot|max:255',
          'description' => 'required|max:255',
          'photo' => 'required|image',
          'interdiction' => 'required|string|max:255',
          'frequentation' => 'required|string|max:255',
          'famille' => 'required|boolean',
          'danger' => 'required|string|max:255',
          'latitude' => 'required',
          'longitude' => 'required'
          
        ]);


        $nameSpot = $request->input('nom');
        $descriptionSpot = $request->input('description');
        $typePlage =  $request->input('typePlage');
        $frequentationSpot = $request->input('frequentation');
        $dangerSpot = $request->input('danger');
        $interdictionSpot = $request->input('interdiction');
        $parkingSpot = $request->input('accesParking');
        $lat = $request->input('latitude');
        $long = $request->input('longitude');

        $id = Auth::id();

        if ($_FILES['photo'] > 0) $erreur = "Erreur lors du transfert";

        if($request->hasFile('photo'))
        {
            $path = $request->photo->store('imagesSpots');

        }

        
        $validatedData = $request->validate([
          'nom' => 'required|unique:spot|max:255',
          'description' => 'required|max:255',
          'photo' => 'required|image',
          'interdiction' => 'required|max:255',
          'frequentation' => 'required|max:255',
          'famille' => 'required|boolean',
          'danger' => 'required|max:255',
          'latitude' => 'required',
          'longitude' => 'required'
          
          
        ]);


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


        return redirect()->action('HomeController@index');


      }

      protected function getSpotForMap(){
        $spot=Spot::all();
        return $spot;
      }

      protected function getFilterSpotForMap(Request $request){

            $familleValue = $request->familleValue;
            $typePlageValue = $request->typePlageValue;
            $frequentationValue = $request->frequentationValue;
            $disciplineValue = $request->disiciplineValue;
            $sportValue = $request->sportValue;

            $spot = DB::table('spot')
                ->leftJoin('post', 'spot.id', '=', 'post.spot_id')
                ->where('famille', $familleValue)
                ->whereIn('typePlage', $typePlageValue)
                ->whereIn('frequentation',$frequentationValue)
                ->whereIn('post.discipline_id', $disciplineValue)
                ->whereIn('post.sport_id', $sportValue)

                ->get();
              return $spot;
      }
}
