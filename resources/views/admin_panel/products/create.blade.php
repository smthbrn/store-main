@extends('layouts.admin')
@section('title','Create Post')
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


                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name:</label>
                        <input required type="text" name="name" id="name" class="form-control">
                        <label for="">Status:</label>
                        <input required type="text" name="status" id="status" class="form-control">
                        <label for="">Reviews:</label>
                        <input required type="text" name="reviews" id="reviews" class="form-control">
                        <label for="">Price:</label>
                        <input required type="text" name="price" id="price" class="form-control">
                        <label for="">Description:</label>
                        <textarea required type="text" name="description" class="form-control"></textarea>
                        <label for="">Category:</label>
                        <select required type="text" name="category_id" class="form-control">
                            @foreach(\App\Models\Categories::all() as $categories)
                                <option value="{{$categories->id}}">{{$categories->name}}</option>
                            @endforeach
                        </select>
                        <label for="">Brand:</label>
                        <select required type="text" name="brand_id" class="form-control">
                            @foreach(\App\Models\Brand::all() as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                        <label for="">Quantity:</label>
                        <input required type="text" name="quantity" id="quantity" class="form-control">
                        <label for="file" >Select Image</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse&hellip;  <input type="file" id="img" name="img">
                                </span>
                                </label>
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Add" class="btn btn-dark float-right">
                </form>

            </div>
        </div>
    </div>

@endsection
