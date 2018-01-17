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

        $sports = DB::table('sport')->select('id', 'nom')->get();

        return view('spot/createSpot', ['sports' => $sports]);
      }


      protected function submit(Request $request)
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
        $familleSpot = $request->input('famille');
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

        $test = DB::table('spot')->insert(
          [
            'nom' => $nameSpot,
            'description' => $descriptionSpot,
            'photo' => $path,
            'typePlage' => $typePlage,
            'interdiction' => $interdictionSpot,
            'famille' => $familleSpot,
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

    protected function getSpot(Request $request){
        $id = $request ->id;
        $spot = Spot::find($id)->first();
        $post = DB::table('post')
            ->where('spot_id',$id)
            ->get();
        $spot_and_post = array($spot, $post);
        return $spot_and_post;
    }

      protected function getFilterSpotForMap(Request $request){

            $familleValue = $request->famille;
            $typePlageValue = $request->typePlage;
            $frequentationValue = $request->frequentation;
            $sportValue = $request->sportValue;
            $spot = DB::table('spot');


            $spot->leftJoin('post', 'spot.id', '=', 'post.spot_id');

            if($familleValue)
            {
              $spot->where('famille', $familleValue);
            }


            if($typePlageValue)
            {

              $spot->whereIn('typePlage', $typePlageValue);
            }
            if($frequentationValue)
            {
              $spot->whereIn('frequentation', $frequentationValue);
            }

            // $spot->whereIn('post.sport_id', $sportValue);

            return $spot->get();

      }
}
