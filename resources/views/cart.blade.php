@extends('layouts.app')

@section('title','Cart')
@section('content')
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">


</head>
<div class="cart-box-main">
    <div class="container" >
        <div class="row" >
            <div class="col-lg-12" >
                <div class="table-main table-responsive" >
                    <table class="table" >
                        <thead style="background: darkcyan">
                        <tr>
                            <th>Images</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session()->get("products", []) as $prodId)
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                        <img class="img-fluid" src="/images/{{$prodId->img}}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="#">
                                        {{$prodId->name}}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>  {{$prodId->price}}
                                    </p>
                                </td>

                                <td class="remove-pr">
                                    <a href="{{route('removecart', ['id' => $prodId->id] )}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-6 col-sm-6">
                <div class="coupon-box">
                    <div class="input-group input-group-sm">
{{--                        <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <button class="btn btn-theme" type="button">Apply Coupon</button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>

        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    @foreach(session()->get("products", []) as $prodId)
                        <div class="d-flex">
                            <h4>{{$prodId->name}}</h4>
                            <div class="ml-auto font-weight-bold"> {{$prodId->price}} </div>
                        </div>
                    @endforeach


                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <div class="ml-auto h5"> {{$totalsum}} </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
