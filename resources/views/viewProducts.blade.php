@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">CodingDuck</a></li>
                        <li class="active">IT</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
	           <!-- Basic example -->
	           <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">View Product</h3></div>
                       {{-- <a href="{{rou te('importProduct')}}" class="btn btn-custom bg-success">Import Product</a> --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product_Name</label>
                                    <p>{{$product->product_name}} </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Product_Code</label>
                                    <p>{{$product->product_code}} </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Category</label>
                                    <p>{{$product->category_id}} </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword19">Supplier</label>
                                    <p>{{$product->supplier_id}} </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Godown</label>
                                   <P>{{$product->product_garage}} </P>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword17">Product_Route</label>
                                    <p>{{$product->product_route}} </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword41">Buying_Date</label>
                                    <p>{{$product->buying_date}} </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Expire_Date</label>
                                    <p>{{$product->expire_date}} </p>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword12">Buying_Price</label>
                                    <p>{{$product->buying_price}} </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">Selling_Price</label>
                                    <p>{{$product->selling_price}} </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword11">Product_Image</label>
                                    <p><img src="{{URL::to($product->product_image)}}"
                                    style="height:400px; width:400px;"  alt="">
                                    </p>
                                </div>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->

    </div> <!-- content -->
</div>


@endsection
