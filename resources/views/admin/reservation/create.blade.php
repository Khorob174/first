@extends('admin.layouts.app_admin')

@section('content')
<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Создать бронь @endslot
    @slot('parent') Главная @endslot
    @slot('active') Бронь @endslot
  @endcomponent
  <hr />
  <form class="form-horizontal" action="{{route('admin.reservation.store')}}" method="post">
    {{ csrf_field() }}

    @include('admin.reservation.partials.form')
  </form>
</div>


@endsection
