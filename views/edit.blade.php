@extends('layout.main')
@section('content')
    <h3>Edit</h3>
    @if(count($errors)>0)
        @foreach($errors as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
    <form action="{{route('curd.update',$profile->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>First Name</label>
            <input type="text" value="{{$profile->first_name}}" name="first_name" class="form-control">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" value="{{$profile->last_name}}" name="last_name" class="form-control">
        </div>
        <div class="form-group">
            <label>Select Profile Image</label>
            <input type="file" class="form-control" name="image">
            <img style="width: 150px" src="{{URL::to('/')}}/images/{{$profile->image}}">
        </div>
        <input type="hidden" name="hidden_image" value="{{$profile->image}}">
        <input type="hidden" name="_method" value="put">
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>
    @endsection
