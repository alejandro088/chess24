<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function matchWhiteWithRival(Player $rival)
    {
        $result = Match::where('black_player_id', $rival->id)->where('white_player_id', $this->id)->get();

        if($result->isEmpty())
            return 0;
        
        return $result[0]->result_white;
    }

    public function matchBlackWithRival(Player $rival)
    {
        $result = Match::where('white_player_id', $rival->id)->where('black_player_id', $this->id)->get();

        if($result->isEmpty())
            return 0;
        
        return $result[0]->result_black;
    }
}
