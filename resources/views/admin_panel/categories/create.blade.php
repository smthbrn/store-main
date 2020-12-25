@extends('layouts.admin')
@section('title','Create Category')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-group text-center">
                <h1>Add</h1>
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


                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Category:</label>
                        <input required type="text" name="name" id="name" class="form-control">
                    </div>
                    <label for="file" >Select Image</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse&hellip;  <input type="file" id="img" name="img">
                                </span>
                            </label>
                        </div>
                    </div>
                    <input type="submit" value="Add" class="btn btn-dark float-right">
                </form>


            </div>
        </div>
    </div>

@endsection

