
@extends('layouts.admin')
@section('title','Details')
@section('content')
    <div class="container">
        <h2>Type name: {{$type->name}} </h2>
        <form action="{{route('type.update',$type->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Type:</label>
                <input required type="text" name="name" value="{{$type->name}}" id="name" class="form-control">
            </div>
            <input type="submit" value="Update" class="btn btn-dark float-right">
        </form>
        <form action="{{route('type.destroy',[$type->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Delete</button>
        </form>
    </div>
@endsection
