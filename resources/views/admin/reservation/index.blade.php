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
    <!--  <form class="form-horizontal" action="{{route('admin.reservation.index')}}" method="post">!-->
    <th>Время записи</th>
    <th>Время заезда</th>
    <th>Номер брони</th>
    <th>Статус</th>
    <!--  <th><input class="btn btn-primary" type="submit" name="stat" value="stat"></th>!-->
    <th>ФИО</th>
    <th class="text-right">Действие</th>
    <!--  </form>!-->
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
  <tfoot>
    <tr>
      <td colspan="3">
        <ul class="pagination pull-right">
          {{$reservations->links()}}
        </ul>
      </td>
    </tr>
  </tfoot>
  </table>
</div>
@endsection
