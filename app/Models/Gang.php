<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gang extends Model
{
    // protected $connection = 'mongodb_test';
    protected $table = 'gang';
    protected $guarded = ['event_id'];
    public static function get_detail()
    {
        return Sponsor::select('sponsor_image')->get()->toArray();
    }


}
