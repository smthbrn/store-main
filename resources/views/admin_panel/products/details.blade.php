@extends('layouts.admin')
@section('title','Details')
@section('content')
    <div class="container">
        <h2>Product: {{$product->name}} </h2>

        <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Name:</label>
                <input required type="text" value="{{$product->name}}" name="name" id="name" class="form-control">
                <label for="">Status:</label>
                <input required type="text" name="status"value="{{$product->status}}"  id="status" class="form-control">
                <label for="">Reviews:</label>
                <input required type="text" name="reviews"value="{{$product->reviews}}"  id="reviews" class="form-control">
                <label for="">Price:</label>
                <input required type="text" name="price" id="price" value="{{$product->price}}" class="form-control">
                <label for="">Description:</label>
                <textarea required type="text" name="description"placeholder="{{$product->description}}"  class="form-control"></textarea>
                <label for="">Category:</label>
                <select required type="text" name="category_id" class="form-control">
                    @foreach(\App\Models\Categories::all() as $categories)
                        <option selected="{{$product->category_id}}"value="{{$categories->id}}">{{$categories->name}}</option>
                    @endforeach
                </select>
                <label for="">Brand:</label>
                <select required type="text" name="brand_id" class="form-control">
                    @foreach(\App\Models\Brand::all() as $brand)
                        <option selected="{{$product->brand_id}}" value="{{$brand->id}}" >{{$brand->name}}</option>
                    @endforeach
                </select>
                <label for="">Quantity:</label>
                <input required type="text" name="quantity" value="{{$product->quantity}}"  id="quantity" class="form-control">
                <label for="file" >Select Image</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse&hellip;  <input type="file" id="img" name="img">
                                    <img src="/images/{{$product->img}}" >
                                </span>
                        </label>
                    </div>
                </div>
            </div>
            <input type="submit" value="Update" class="btn btn-dark float-right">
        </form>

        <form action="{{route('product.destroy',[$product->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Delete</button>
        </form>
    </div>
@endsection
