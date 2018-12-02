<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Player;

class PageController extends Controller
{
    public function index()
    {

        $groups = Group::all();
        //$players = Player::all();

        return view('index', compact('groups'));
    }
}
