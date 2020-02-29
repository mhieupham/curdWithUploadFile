@extends('layout.main')
@section('content')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
    <form action="{{route('curd.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control">

        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control">
        </div>
        <div class="form-group">
            <label>Select Profile Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <input type="submit" class="btn btn-primary" value="ADD">
    </form>
    @endsection
