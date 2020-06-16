@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Поиск брони по ID @endslot
    @slot('parent') Главная @endslot
    @slot('active') Бронь @endslot
  @endcomponent





  <hr />
  <form class="form-horizontal" action="{{route('admin.show')}}" method="post">
    {{ csrf_field() }}
    <label for="">ID брони</label>
    <input type="text" class="form-control" name="id" placeholder="Номер" required>
  <hr />
  <!--  <input class="btn btn-primary" type="submit" href="{{route('admin.reservation.show', 2)}}" value="Получить бронь по ID"> !-->
  <input class="btn btn-primary" type="submit" value="Получить бронь по ID">
  </form>
  <hr />
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
          <td class="text-right">
            {{ csrf_field() }}
            <form onsubmit="if(confirm('Удалить?')){ return true}else{ return false}" action="{{route('admin.reservation.destroy', $reservation)}}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}

              <a class="btn btn-default" href="{{route('admin.reservation.edit', $reservation)}}"> <i class="fa fa-edit"></i> </a>

              <button type="submit" class="btn"> <i class="fa fa-trash-o"></i> </button>
            </form>


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
