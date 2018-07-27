@extends('welcome')
@section('content')
<div class="content">
                <div class="title m-b-md">
                    Be Online
                </div>
                @auth
                    @include('partials.authNav')
                @else
                    @include('partials.guestNav')
                @endauth
            </div>
@endsection