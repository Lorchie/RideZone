<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class PostController extends Controller
{
    protected function create(Request $request)
      {
        
        $validatedData = $request->validate([
          'bestWindForceMax' => 'required|integer',
          'bestWindForceMinus' => 'required|integer',
          'bestWindDirection' => 'required|string',
          'danger' => 'required|string|max:255',
          
          
        ]);

        $bestWindForceMax = $request->input('bestWindForceMax');
        $bestWindForceMinus = $request->input('bestWindForceMinus');
        $bestWindDirection = $request->input('bestWindDirection');
        $levelMini = $request->input('levelMini');
        $danger = $request->input('danger');
        $user_id = Auth::id();
       

        $id = Auth::id();
    


        $test = DB::table('post')->insert(
          [
            'bestWindForceMax' => $bestWindForceMax,
            'bestWindForceMinus' => $bestWindForceMinus,
            'bestWindDirection' => $bestWindDirection,
            'levelMini' => $levelMini,
            'danger' => $danger,
            'user_id' => $id
          ]
        );

     
        return "df";
        
       
      }
}
