<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsor';
    
    public static function getImageAll(){
        return Sponsor::select('sponsor_image')->get()->toArray();
    }
}
