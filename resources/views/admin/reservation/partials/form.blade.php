
  @if (isset($reservation->id))
  <label for="">Статус</label>
  <select class="form-control" name="published">
    <option value="0" @if ($reservation->stat == 0) selected=""  @endif>Ожидание подтверждения</option>
    <option value="1" @if ($reservation->stat == 1) selected=""  @endif>Подверждена</option>
    </select>
  @else

  @endif

<label for="">Дата заезда</label>
<input type="text" class="form-control" name="arrival" placeholder="ММ/ДД/ГГГГ" value="{{$reservation->arrival ?? ""}}" required>

<label for="">Номер</label>
<input type="text" class="form-control" name="booking_number" placeholder="Номер" value="{{$reservation->booking_number ?? ""}}" required>
<label for="">ФИО</label>
<input type="text" class="form-control" name="user" placeholder="Фамилия, Имя, Отчество" value="{{$reservation->user ?? ""}}">

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$reservation->slug ?? ""}}" readonly="">

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
