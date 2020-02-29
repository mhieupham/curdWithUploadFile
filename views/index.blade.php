@extends('layout.main')
@section('content')
    <h3 class="py-3">Index</h3>
    <br>
    @if(\Session::has('success'))
        <div class="alert alert-success">{{\Session::get('success')}}</div>
        @endif

    <br>
    <a href="{{route('curd.create')}}" class="btn btn-primary float-right">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($curd as $row)
        <tr>
            <th scope="row">{{$row->id}}</th>
            <td><img style="width: 50px" src="{{\Illuminate\Support\Facades\URL::to('/')}}/images/{{$row->image}}"> </td>
            <td style="text-transform: capitalize">{{$row->first_name}}</td>
            <td style="text-transform: capitalize">{{$row->last_name}}</td>
            <td>
                <a href="{{route('curd.show',$row->id)}}" class="btn btn-info">Show</a>
                <a href="{{route('curd.edit',$row->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{route('curd.delete',$row->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$curd->links()}}
    @endsection
