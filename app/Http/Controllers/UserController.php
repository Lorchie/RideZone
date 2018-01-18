<?php

namespace App\Http\Controllers;

use App\sport;
use App\sportUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        $dataUser = Auth::user();
        $id = $dataUser['id'];
        $name = $dataUser['name'];
        $email = $dataUser['email'];
        $dataSport = DB::table('sportUser')
            ->where('user_id', $id)
            ->get();

        $idSportUser = [];
        foreach ($dataSport as $row){
            $idSportUser[] = ($row->sport_id);
        }


        $sport = sport::
            leftJoin('sportUser','sport.id' ,'=', 'sportUser.sport_id')
            ->where('user_id', $id)
            ->get();
        return view('spot/showUserAccount',['nameUser'=>$name, 'emailUser'=>$email,'sports'=>$sport,'dataSport'=>$idSportUser]);
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

        $idSportUser = [];
            foreach ($dataSport as $row){
                $idSportUser[] = ($row->sport_id);
            }


        $sport = $this->getSport();
      return view('spot/updateUserAccount',['nameUser'=>$name, 'emailUser'=>$email,'sports'=>$sport,'dataSport'=>$idSportUser]);
    }

    public function getSport(){

        $sports = DB::table('sport')->get();
        return $sports;
    }



    public function update(Request $request){


        $user = Auth::user();

        $validatedData = $request->validate([
            'name' =>'required|unique:users,id,'.$user->id,
            'email' => 'required|unique:users,email,'.$user->id,
            'password'=>'sometimes|nullable|min:6|required_with_all: email,nom|confirmed'
        ]);

        $nom = $request->input('name');
        $email = $request->input('email');

        if ( Hash::check($request->input('currentPassword'), $user['password'])){
            if($request->input('password') == $request->input('password_confirmation')){
                $password =  bcrypt($request->input('password'));


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
        $sportsUser =  explode(',',$request->input('sportUser'));
        $deleteSport = DB::table('sportUser')->where('user_id', $user->id)->delete();
        $ajoutSport = DB::table('sportUser');
        if(! empty($request->input(('sportUser')))) {
            foreach ($sportsUser as $sportUser) {
                $ajoutSport->insert(
                    [
                        'user_id' => $user->id,
                        'sport_id' => $sportUser
                    ]
                );
            }
        }
            return redirect()->action('UserController@index');


    }

}
