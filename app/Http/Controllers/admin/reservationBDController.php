<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reservationBDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request->input("sort")==null)
      {
        return view('admin.reservation.index', [
          'reservations' => Reservation::paginate(10),
          'abc'=>''
        ]);
      }else{
        if($request->input("abc")==null){
          return view('admin.reservation.index', [
            'reservations' => Reservation::orderBy($request->input("sort"))->paginate(10),
            'sort'=>$request->input("sort"),
            'abc'=>''
            ]);
        }else{
          return view('admin.reservation.index', [
            'reservations' => Reservation::orderBy($request->input("sort"),$request->input("abc"))->paginate(10),
            'sort'=>$request->input("sort"),
            'abc'=>$request->input("abc")
        ]);
        }
      }


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.reservation.create', [
        'reservation' => [],
        'delimiter'=> ''
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reservation::create($request->all());
        if (!Auth::guest())
        return redirect()->route('admin.reservation.index');
        else return redirect('/');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
      return view('admin.reservation.edit', [
        'reservation' => $reservation,
        'delimiter'=> ''
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->except('slug'));

        return redirect()->route('admin.reservation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.reservation.index');
    }
}
