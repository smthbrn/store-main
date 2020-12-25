@extends('layouts.admin')
@section('title','Details')
@section('content')
    <div class="container">
        <h2>Title: {{$category->name}} </h2>

        <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Category:</label>
                <input required type="text" value="{{$category->name}}" name="name" id="name" class="form-control">
            </div>
            <label for="file" >Select Image</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse&hellip;  <input type="file" id="img" name="img">
                                    <img src="/images/{{$category->img}}">
                                </span>
                    </label>
                </div>
            </div>
            <input type="submit" value="Update" class="btn btn-dark float-right">
        </form>
        <form action="{{route('category.destroy',[$category->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Delete</button>
        </form>
    </div>
@endsection
