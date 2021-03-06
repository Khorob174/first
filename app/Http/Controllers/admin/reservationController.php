<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    //reservation
    public function reservation(){
      return view('admin.reservation',[
          'reservations' => Reservation::paginate(10)
      ]);
    }
    public function show(request $reservation){
      return view('admin.reservation.show',[
          'reservations' => Reservation::find($reservation)
      ]);
    }
}
