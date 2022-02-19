<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use DB;
use App\User;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Auth::logout();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function registration($referral) {  
        $data = DB::table('users')->where('username', $referral)->first();   
        
        if($data){
            return View::make('auth.register')->with('referral',$referral)->with('data', $data);
        }else{
           return View::make('norefferal');
        }
    }
}
