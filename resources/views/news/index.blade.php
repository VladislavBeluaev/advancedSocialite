@extends('welcome')
@include('partials.sessionFlash')
@section('content')

@forelse($news as $new)
<div class="card" style="width:400px">
    <div class="card-body">
      <h4 class="card-title">{{$new->title}}</h4>
      <p class="card-text">{{$new->body}}</p>
      <p class="card-text">{{$new->creator()}}</p>
    </div>
    <div class="row">
     <a href="{{route('news.show',['id'=>$new->id])}}">Перейти к статье </a>

     @can('edit',$new)
     <a href="{{route('news.edit',['id'=>$new->id])}}">Исправить <i class="fa fa-edit"></i></a>
      @endcan
      <a href="{{route('news.show',['id'=>$new->id])}}"> Комментарий<i class="fa fa-comments-o" aria-hidden="true"></i></a>
    </div> 
  </div>
  @empty
  <div class="card" style="width:400px">
    <div class="card-body">
      <h4 class="card-title">Новостей пока нет</h4>
    </div>
  </div>
 
@endforelse
<a href="{{route('news.create')}}" class="btn btn-primary">Создать статью ?</a>
{{$news->links()}}
@endsection
