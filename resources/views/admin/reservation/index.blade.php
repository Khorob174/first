@extends('admin.layouts.app_admin')

@section('content')
<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Список брони @endslot
    @slot('parent') Главная @endslot
    @slot('active') Бронь @endslot
  @endcomponent

  <hr>

  <a href="{{route('admin.reservation.create')}}" class="btn btn-primary pull-right"> <i class="fa fa-plus-square-o"></i> Создать бронь</a>
  <table class="table table-striped">
  <thead>
    <th>Время записи</th>
    <th>Время заезда</th>
    <th>Номер брони</th>
    <th>Статус брони</th>
    <th>ФИО</th>
    <th class="text-right">Действие</th>
  </thead>
  <tbody>
    @forelse ($reservations as $reservation)
      <tr>
        <td>{{$reservation->created_at}}</td>
        <td>{{$reservation->arrival}}</td>
        <td>{{$reservation->booking_number}}</td>
        <td>
           @if ($reservation->stat == 0) Ожидание подтверждения @endif
           @if ($reservation->stat == 1) Подверждена @endif
        </td>
        <td>{{$reservation->user}}</td>
        <td>
          {{ csrf_field() }}


          <a class="btn btn-default" href="{{route('admin.reservation.edit', $reservation)}}"> <i class="fa fa-edit"></i> </a>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="6" class="text-center"><h2>Данных нет</h2></td>
      </tr>
    @endforelse
  </tbody>
  </table>
</div>
@endsection
