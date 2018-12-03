<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['white_player_id', 'black_player_id', 'created_at', 'updated_at'];

    public function getWhitePlayerAttribute()
    {
        return Player::find($this->white_player_id);
    }

    public function getBlackPlayerAttribute()
    {
        return Player::find($this->black_player_id);
    }
}
