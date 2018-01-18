<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\sport;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sports = DB::table('sport')->select('id', 'nom')->get();
        $disciplines = DB::table('disciplines')->select('id', 'nom')->get();

        return view('home', ['sports' => $sports, 'disciplines' => $disciplines]);
    }
}
