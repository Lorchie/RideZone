<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Post;

class PostController extends Controller
{
    protected function create(Request $request, $spot_id)
    {

        $spot = DB::table('spot')->where('id', $spot_id)->first();
        $sports = DB::table('sport')->select('id', 'nom')->get();

        $data['spot'] = $spot;
        $data['sports'] = $sports;

        return view('spot/createPost', ['data' => $data]);
    }

    protected function postSport(Request $request)
    {


          $post = Post::first();

          return array($post->sport);
    }

    protected function submit(Request $request)
      {

        $validatedData = $request->validate([
          'bestWindForceMax' => 'required|integer',
          'bestWindForceMinus' => 'required|integer',
          'bestWindDirection' => 'required|string',
          'danger' => 'required|string|max:255',
          'sport_id' => 'required',
          'spot_id' => 'required'


        ]);

        $bestWindForceMax = $request->input('bestWindForceMax');
        $bestWindForceMinus = $request->input('bestWindForceMinus');
        $bestWindDirection = $request->input('bestWindDirection');
        $levelMini = $request->input('levelMini');
        $danger = $request->input('danger');
        $spot_id = $request->input('spot_id');
        $sport_id = $request->input('sport_id');
        $user_id = Auth::id();


        $id = Auth::id();

        $test = DB::table('post')->insert(
          [
            'bestWindForceMax' => $bestWindForceMax,
            'bestWindForceMinus' => $bestWindForceMinus,
            'bestWindDirection' => $bestWindDirection,
            'levelMini' => $levelMini,
            'danger' => $danger,
            'user_id' => $id,
            'sport_id' => $sport_id,
            'spot_id' => $spot_id,
            'discipline_id' => "0"
          ]
        );

        return redirect()->action('HomeController@index');
      }
}
