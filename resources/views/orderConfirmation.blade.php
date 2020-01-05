
@extends('layouts.app')
@section('content')
 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">CodingDuck</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">CodingDuck</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right">Invoice</h4>
                                            </div>
                                            <div class="pull-right">
                                                <h4>Order date <br>
                                                    <strong>{{$orders->order_date}}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>
                                                        Name:
                                                        {{ $orders->name }}
                                                      </strong>
                                                      <br>
                                                      <strong>
                                                        Shop Name:
                                                        {{ $orders->shop_name }}
                                                      </strong>
                                                      <br>
                                                      <strong>
                                                        Address:
                                                        {{ $orders->address }}
                                                      </strong>
                                                      <br>
                                                      <strong>
                                                        City:
                                                        {{ $orders->city }}
                                                      </strong>
                                                      <br>
                                                      <strong>
                                                        Phone:
                                                       {{ $orders->phone }}
                                                      </strong>
                                                    </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Today Date: </strong> {{ date("l jS \of F Y ") }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong>
                                                     <span class="label label-pink">Pending</span></p>
                                                    <p class="m-t-10"><strong>Order ID:{{$orders->id}} </strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>product_name</th>
                                                            <th>product_code</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $sl=1;
                                                            @endphp
                                                            @foreach($order_details as $cont)
                                                            <tr>
                                                                <td>{{$sl++}}</td>
                                                                <td>{{$cont->product_name}}</td>
                                                                <td>{{$cont->product_code}}</td>
                                                                <td>{{$cont->quantity}}</td>
                                                                <td>{{$cont->unitcost}}</td>
                                                                <td>{{$cont->unitcost*$cont->quantity}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <br>
                                            <div class="col-md-9">
                                                <h1>Payment By {{$orders->payment_status}} </h1>
                                                <h2>Pay: {{$orders->pay}} </h2>
                                                <h2>Due: {{$orders->due}} </h2>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="text-right"><b>Sub-total: </b>{{$orders->sub_total}}</p>
                                                <p class="text-right">VAT: {{$orders->vat}}</p>
                                                <hr>
                                                <h3 class="text-right">Total: {{$orders->total}}</h3>
                                            </div>
                                        </div>
                                        @if($orders->order_status=='success')
                                        @else
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="{{URL::to('/posDone/'.$orders->id)}} "
                                                 class="btn btn-primary waves-effect waves-light">Done
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>



            </div> <!-- container -->

                </div> <!-- content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

@endsection
