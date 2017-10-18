<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamType extends Model
{
    // protected $connection = 'mongodb_test';
    protected $table = 'team_type';
    public static function get_number_of_team($team_type_id)
    {
        return TeamType::where('team_type_id',$team_type_id)->first()->team_type_number_of_team;
    }
}
