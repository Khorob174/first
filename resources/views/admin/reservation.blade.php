@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <a class="btn btn-block btn-default" href="{{route('admin.reservation.create')}}">Создать бронь</a>
      @foreach ($reservations as $Reservation)
        <a class="list-group-item" href="{{route('admin.reservation.edit', $Reservation)}}">
          <h4 class="list-group-item-heading">{{$Reservation->arrival}} {{$Reservation->booking_number}}</h4>
        </a>
      @endforeach
    </div>
  </div>
</div>
@endsection
