@extends('admin.layouts.app_admin')

@section('content')
<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Список брони1 @endslot
    @slot('parent') Главная @endslot
    @slot('active') Бронь @endslot
  @endcomponent

  <hr>

  <a href="{{route('admin.reservation.create')}}" class="btn btn-primary pull-right"> <i class="fa fa-plus-square-o"></i> Создать бронь</a>
  <thead>
    <th>Наименование</th>
    <th>Публикация</th>
    <th class="text-right">Действие</th>
  </thead>
  <tbody>
    @forelse ($reservations as $reservation)
      <tr>
        <td>{{$reservation->title}}</td>
        <td>{{$reservation->published}}</td>
        <td>
          <a href="{{route('admin.reservation.edit', ['id'=>$reservation->id])}}"> <i class="fa fa-edit"></i> </a>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="3" class="text-center"><h2>Данных нет</h2></td>
      </tr>
    @endforeach
  </tbody>

</div>
@endsection
