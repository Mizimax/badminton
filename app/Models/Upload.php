<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    public $primaryKey = 'upload_id';
    protected $table = 'upload';
    protected $guarded = ['upload_id'];
}
