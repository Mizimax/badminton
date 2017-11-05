<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineTeam extends Model
{
    // protected $connection = 'mongodb_test';
    protected $table = 'line_team';
    
    public static function addTeam($team)
    {
        self::insert($team);
    }
}
