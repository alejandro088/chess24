<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function players()
    {
        return $this->HasMany('App\Player');
    }
}
