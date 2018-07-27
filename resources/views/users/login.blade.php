@extends('welcome')
@section('content')
<form method="POST" action="{{route('apiLogin')}}">
  {{csrf_field()}}
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="string" class="form-control" id="email" name='email'>
    <p class = "alert-danger">{{$errors->first('email')}}</p>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection