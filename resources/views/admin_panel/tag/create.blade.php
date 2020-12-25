@extends('layouts.admin')
@section('title','Create Tag')
@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
       {{session()->get('success')}}
    </div>
    @endif
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-group text-center">
                <h1>Add tag</h1>
            </div>
            <div class="col-md-6 offset-3">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('tag.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Tag:</label>
                        <input required type="text" name="name" id="name" class="form-control">
                    </div>
                    <input type="submit" value="Add" class="btn btn-dark float-right">
                </form>


            </div>
        </div>
    </div>
@endsection
