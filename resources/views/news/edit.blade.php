@extends('welcome')
@include('partials.sessionFlash')
@section('content')
<div class="col-md-8">
<form method="POST" action="{{route('news.update',['id'=>$news->id])}}">
 {{method_field('PUT')}} 
{{csrf_field()}}
  <div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" class="form-control" id="title" name='title' value="{{$news->title}}">
    <p class = "alert-danger">{{$errors->first('title')}}</p>
  </div>
  <div class="form-group">
    <label for="password">Описание</label>
    <textarea name='body'>{{$news->body}}</textarea>
    <p class = "alert-danger">{{$errors->first('body')}}</p>
  </div>
  <div class="form-group">
  <div class="d-flex justify-content-between">
  <button type="submit" class="btn btn-primary">Изменить</button>
  </div>
  </div>
</form>
@endsection