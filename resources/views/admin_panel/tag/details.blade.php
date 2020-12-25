@extends('layouts.admin')
@section('title','Details')
@section('content')
    <div class="container">
        <h2>Tag name: {{$tag->name}} </h2>
        <form action="{{route('tag.update',$tag->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <input required type="text" value="{{$tag->name}}" name="name" id="name" class="form-control">
            </div>
            <input type="submit" value="Update" class="btn btn-dark float-right">
        </form>
        <form action="{{route('tag.destroy',[$tag->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Delete</button>
        </form>
    </div>
@endsection
