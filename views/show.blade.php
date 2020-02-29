@extends('layout.main')
@section('content')
    <a href="{{route('home')}}" class="btn btn-primary">Back</a>
    <br>
    @if(\Session::has('success'))
        <div class="alert alert-success">{{\Session::get('success')}}</div>
        @endif
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <img style="width: 350px" src="{{URL::to('/')}}/images/{{$profile->image}}">
                </div>
                <div class="col-6">
                    <label>Tên:</label>
                    <p>{{$profile->first_name}}{{$profile->last_name}}</p>
                </div>
            </div>

        </div>
    </div>
    @endsection
