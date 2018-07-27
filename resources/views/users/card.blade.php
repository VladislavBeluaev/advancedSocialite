@extends('welcome')
@section('content')
<div class="card" style="width:400px">
    <img class="card-img-top" src="{{$user->avatar}}" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{$user->getWebProfileFirstName()}}</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      @can('edit_forum'))
      <a href="#" class="btn btn-primary">Улучшить профиль</a>
      @endcan
      @can('manage_money')
      <a href="#" class="btn btn-primary">Купить профиль</a>
      @endcan
    </div>
  </div>
@endsection