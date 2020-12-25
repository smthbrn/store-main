@extends('layouts.admin')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Panel</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="list-group">
                @foreach($posts as $post)
                    <a href="{{route('blog.show',$post)}}" class="list-group-item list-group-item-action">{{$post->title}}</a>
                @endforeach
            </div>
        </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        <!-- /.container-fluid -->
    </section>
@endsection
