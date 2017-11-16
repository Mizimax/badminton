<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialEventMember extends Model
{
    protected $table = 'special_event_member';
    protected $fillable = ['special_event_member_user_id','special_event_member_event_id','special_event_member_special_event_id','special_event_member_status','special_event_member_rewards_id'];
    
    public static function register($data)
    {
        return self::create($data);
    }
}
