<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $primaryKey = 'Team_id';

    protected $guarded = ['Team_id'];
}
