<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    //reservation
    public function reservation(){
      return view('admin.reservation');
    }
}
