<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';
    protected $fillable = ['team_name', 'team_event_id', 'team_register_by','team_max_rank'];   
}
