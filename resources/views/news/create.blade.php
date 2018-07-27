@extends('welcome')
@include('partials.sessionFlash')
@section('content')
<div class="col-md-8">
<form method="POST" action="{{route('news.store')}}">
{{csrf_field()}}
  <div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" class="form-control" id="title" name='title' value="{{old('title')}}">
    <p class = "alert-danger">{{$errors->first('title')}}</p>
  </div>
  <div class="form-group">
    <label for="password">Описание</label>
    <textarea name='body'>{{old('body')}}</textarea>
    <p class = "alert-danger">{{$errors->first('body')}}</p>
  </div>
  <div class="form-group">
  <div class="d-flex justify-content-between">
  <button type="submit" class="btn btn-primary">Создать</button>
  </div>
  </div>
</form>
@endsection