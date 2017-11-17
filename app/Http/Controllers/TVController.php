<?php

namespace App\Http\Controllers;


use App\Models\Court;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class TVController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function  show_court($event_id){
        $court = Court::get();
        return view('front/tv/show_court')->with('court',$court);
    }

    public function tv($event_id){
        return view('front/tv/index');
    }

    public function news_special_event($pic){
        switch($pic){
            case 1 :
                return '<img src="/images/events/1/special/1.png" class="img-responsive"  alt="">';
                break;
            case 2 :
                return '<img src="/images/events/1/special/2.png" class="img-responsive"  alt="">';
                break;
            case 3 :
                return '<img src="/images/events/1/special/3.png" class="img-responsive"  alt="">';
                break;
        }
    }
}