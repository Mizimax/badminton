<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'rank';
    public static function get_rank_by_list($rank)
    {
        return Rank::whereIn('rank_id',$rank)->get();
    }
}
