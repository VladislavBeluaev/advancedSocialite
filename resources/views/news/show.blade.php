@extends('welcome')
@include('partials.sessionFlash')
@section('content')
<div class="card">
  <div class="card-header">
    {{$news->title}}
  </div>
  <div class="card-body">
    <p class="card-title">{{$news->body}}</p>
  </div>
  <h5 class="card-title">Комментарии</h5>
  @forelse ($news->comments as  $comments)
     <h6 class="card-title">{{$comments->body}}</h6>
    @empty
      <h6 class="card-title">Комментариев пока нет!!</h6>
@endforelse
  <div class="card-footer">
    Добавить комментарий
  </div>
<form method="POST" action="{{route('comments.store',['id'=>$news->id])}}">
{{csrf_field()}}
  <div class="form-group">
    <label for="title"></label>
    <input type="text" class="form-control" id="" name='body' value="{{old('body')}}"></input>
    <p class = "alert-danger">{{$errors->first('body')}}</p>
  </div>
  <div class="form-group">
  <div class="d-flex justify-content-between">
  <button type="submit" class="btn btn-primary">Создать</button>
  </div>
  </div>
</form>  
</div>
@endsection