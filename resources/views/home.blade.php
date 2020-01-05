@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">CodingDuck</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            {{date('d/m/y')}}

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                        @php
                            $Sales=DB::table('orders')->sum('total');
                        @endphp
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{$Sales}}</span>
                           Total Sales
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase"> Sales</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                        @php
                            $ord=DB::table('orders')->count('id');
                        @endphp
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{$ord}} </span>
                            All Orders
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Orders</h5>
                                <div class="progress progress-sm m-0">
                                    <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3">
                    @php
                     $cust=DB::table('customers')->count('name');
                    @endphp
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{$cust}} </span>
                            Total Customers
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Customers</h5>
                                <div class="progress progress-sm m-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                        @php
                            $prod=DB::table('orders')->count('total_products');
                        @endphp
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{$prod}} </span>
                            Total Products
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <h5 class="text-uppercase">Products</h5>
                                <div class="progress progress-sm m-0">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget -->
    </div> <!-- container -->
 </div> <!-- content -->
@endsection
