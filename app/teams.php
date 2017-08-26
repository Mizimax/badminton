<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teams extends Model
{
    protected $primaryKey = 'Team_id';

    protected $guarded = ['Team_id'];

    public function Users()
    {
        
        return $this->hasMany('App\User','User_id');
    }


}
