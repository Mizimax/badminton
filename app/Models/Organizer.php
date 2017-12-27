<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    //
    public $primaryKey = 'org_id';
    protected $table = 'organizer';
    protected $guarded = ['org_id'];
}
