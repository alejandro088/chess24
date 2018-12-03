<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;

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
        $matches = Match::all();
        //$players = Player::all();

        return view('home', compact('matches'));
    }

    public function setResult(Match $match, $score)
    {
        //score: 1= gana blancas, 2=gana negras, 3= empate
        
        if($score ==1){            
            $match->result_white = 1;
            $p1 = $match->white_player;
            $p1->points += 1;
            $p1->save();
            $match->created_at = now();
            $match->save();  
        }elseif($score == 2){
            $match->result_black = 1;
            $p2 = $match->black_player;
            $p2->points += 1;
            $p2->save();
            $match->created_at = now();
            $match->save();
        }elseif($score == 3){
            $match->result_white = 0.5;
            $match->result_black = 0.5;
            $p1 = $match->white_player;
            $p1->points += 0.5;
            $p1->save();
            $p2 = $match->black_player;
            $p2->points += 0.5;
            $p2->save();
            $match->created_at = now();
            $match->save();
        }

        return redirect()->back()->with("status", "Se ha registrado el resultado");
    }
}
