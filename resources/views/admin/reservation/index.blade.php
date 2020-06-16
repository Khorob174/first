@extends('admin.layouts.app_admin')

@section('content')
<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Список брони @endslot
    @slot('parent') Главная @endslot
    @slot('active') Бронь @endslot
  @endcomponent

  <hr>
  <hr>
  <a href="{{route('admin.reservation.create')}}" class="btn btn-primary pull-right"> <i class="fa fa-plus-square-o"></i> Создать бронь</a>
  <table class="table table-striped">
  <thead>
    <th>
       @if ($abc == 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'created_at'])}}">Время записи</a>  @endif
       @if ($abc != 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'created_at','abc'=>'desc'])}}">Время записи</a>  @endif
    </th>
    <th>
      @if ($abc == 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'arrival'])}}">Время заезда</a>@endif
      @if ($abc != 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'arrival','abc'=>'desc'])}}">Время заезда</a>@endif
    </th>
    <th>
      @if ($abc == 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'booking_number'])}}">Номер</a>@endif
      @if ($abc != 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'booking_number','abc'=>'desc'])}}">Номер</a>@endif
    </th>
    <th>
      @if ($abc == 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'stat'])}}">Статус</a>@endif
      @if ($abc != 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'stat','abc'=>'desc'])}}">Статус</a>@endif
    </th>
    <th>
      @if ($abc == 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'user'])}}">ID жильца</a>@endif
      @if ($abc != 'desc')<a class="dropdown-item" href="{{route('admin.reservation.index', ['sort'=>'user','abc'=>'desc'])}}">ID жильца</a>@endif

    </th>
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
  <tfoot>
    <tr>
      <td colspan="3">
        <ul class="pagination pull-right">

              @if ($abc == 'desc'){{$reservations->appends(['sort' => $sort ?? '','abc'=> $abc])->links()}}@endif
              @if ($abc != 'desc'){{$reservations->appends(['sort' => $sort ?? ''])->links()}}@endif


        </ul>
      </td>
    </tr>
  </tfoot>
  </table>
</div>
@endsection
