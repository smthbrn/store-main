@extends('layouts.admin')
@section('title','Details')
@section('content')
    <div class="container">
        <form action="{{route('brand.update',$brand->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Brand name:</label>
                <input required type="text" value="{{$brand->name}}" name="name" id="name" class="form-control">
            </div>
            <input type="submit" value="Update" class="btn btn-dark float-right">
        </form>
        <form action="{{route('brand.destroy',[$brand->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Delete</button>
        </form>
    </div>

@endsection
