<?php

namespace App\Http\Controllers;

use App\sport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('spot/showUserAccount');
    }

    public function showUpdate(){

        // + cas ou idSportUser est null
        $dataUser = Auth::user();
        $id = $dataUser['id'];
        $name = $dataUser['name'];
        $email = $dataUser['email'];
        $dataSport = DB::table('sportUser')
                        ->where('user_id', $id)
                       ->get();
        foreach ($dataSport as $row){
            $idSportUser[] = ($row->sport_id);
        }

        $sport = $this->getSport();
        return view('spot/updateUserAccount',['nameUser'=>$name, 'emailUser'=>$email,'sport'=>$sport,'dataSport'=>$idSportUser]);
    }

    public function getSport(){

        $sport = DB::table('sport')->get();
        return $sport;
    }



    public function update(Request $request){


        $user = Auth::user();

        $validatedData = $request->validate([
            'name' =>'required|unique:users,id,'.$user->id,
            'email' => 'required|unique:users,email,'.$user->id,
            //validate minimum 6
            'password'=>'required_with_all: email,name|confirmed'
        ]);

        $nom = $request->input('name');
        $email = $request->input('email');
        if ($request->input('currentPassword') == $user['password']){
            if($request->input('password') == $request->input('password_confirmation')){
                $password = $request->input('password');

                $ajoutUser = DB::table('users')->where('id',$user['id'])
                    ->update(
                        [
                            'name' => $nom,
                            'email' => $email,
                            'password' => $password,

                        ]

                    );
            }
        }

        // vérifier si check en js et retourner le tableau en hidden de la liste des checked
        // ajouter tout les check if not exist
        /*$ajoutSport = DB::table('sportUser')
            ->update(


            );

*/

        return redirect()->action('HomeController@index');
    }

}
