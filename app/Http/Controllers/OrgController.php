<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrgController extends Controller
{
    public function createPage() {
      return view('org/event/create');
    }
}
