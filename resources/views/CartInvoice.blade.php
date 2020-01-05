
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
                                                <h4>Invoice # <br>
                                                    <strong>{{date("d/m/y")}}</strong>
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
                                                        {{ $custom->name }}
                                                      </strong>
                                                      <br>
                                                      <strong>
                                                        Shop Name:
                                                        {{ $custom->shop_name }}
                                                      </strong>
                                                      <br>
                                                      <strong>
                                                        Address:
                                                        {{ $custom->address }}
                                                      </strong>
                                                      <br>
                                                      <strong>
                                                        City:
                                                        {{ $custom->city }}
                                                      </strong>
                                                      <br>
                                                      <strong>
                                                        Phone:
                                                       {{ $custom->phone }}
                                                      </strong>
                                                    </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> {{ date("l jS \of F Y ") }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong>
                                                     <span class="label label-pink">Pending</span></p>
                                                     @php
                                                         $order=DB::table('orders')->select('id')->first();
                                                     @endphp
                                                    <p class="m-t-10"><strong>Order ID:{{$custom->id}} </strong>
                                                        {{-- {{$order++}} --}}
                                                    </p>
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
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $sl=1;
                                                            @endphp
                                                            @foreach($contents as $cont)
                                                            <tr>
                                                                <td>{{$sl++}}</td>
                                                                <td>{{$cont->name}}</td>
                                                                <td>{{$cont->qty}}</td>
                                                                <td>{{$cont->price}}</td>
                                                                <td>{{$cont->price*$cont->qty}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total: </b>{{Cart::subtotal()}}</p>
                                                <p class="text-right">VAT: {{Cart::tax()}}</p>
                                                <hr>
                                                <h3 class="text-right">Total: {{Cart::total()}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                            </div>
                                        </div>
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

{{-- Payable model --}}
<form action="{{url('/finalInvoice')}} " method="POST">
    @csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header text-warning">
                <h4 class="modal-title ">Invoice of
                 {{$custom->name}}
                <span class="pull-right">Total: {{Cart::total()}}</span></h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                @endif
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Payable</label>
                            <select class="form-controll" name="payment_status">
                                <option value="handcash">Handcash</option>
                                <option value="cheque">Cheque</option>
                                <option value="due">Due</option>
                            </select>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Pay</label>
                            <input type="text" class="form-control" id="field-6" name="pay">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Due</label>
                            <input type="text" class="form-control" id="field-5" name="due" >
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="custom_id" value="{{$custom->id}} ">
            <input type="hidden" name="order_date" value="{{date("d/m/y")}} ">
            <input type="hidden" name="order_status" value="pending ">
            <input type="hidden" name="total_products" value="{{Cart::count()}} ">
            <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
            <input type="hidden" name="vat" value="{{Cart::tax()}} ">
            <input type="hidden" name="total" value="{{Cart::total()}} ">
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
</form>
@endsection
