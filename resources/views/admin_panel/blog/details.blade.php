@extends('layouts.admin')
@section('title'){{$post->title}}
@section('content')
    <div class="container">

        <form action="{{route('blog.update', $post->id)}}" method="post"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Title:</label>
                <input required type="text" value="{{$post->title}}" name="title" id="title" class="form-control">
                <label for="">Text:</label>
                <textarea required type="text" placeholder="{{$post->text}}" name="text" class="form-control"></textarea>
                <label for="">Type:</label>
                <select required type="text" onselect="{{$post->type_id}}" name="type_id" class="form-control">
                    @foreach(\App\Models\Type::all() as $type)
                        <option selected="{{$post->type_id}}" value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
                <label for="">Tag:</label>
                <select required type="text" name="tag_id" class="form-control">
                    @foreach(\App\Models\Tag::all() as $tag)
                        <option selected="{{$post->tag_id}}" value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <label for="file" >Select Image</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse&hellip;  <input type="file"  id="img" name="img">
                                    <img src="/images/{{$post->img}}">
                                </span>
                    </label>
                </div>
            </div>
            <input type="submit" value="Update" class="btn btn-dark float-right">
        </form>

        <form action="{{route('blog.destroy',[$post->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Delete</button>
        </form>

    </div>
@endsection
