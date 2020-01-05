@extends('layouts.app')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-info">
                    <h4 class="pull-left page-title text-white">POS(Point Of Sale)</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#"  class="text-white" >CodingDuck</a></li>
                        <li class="text-active">{{date('d/m/y')}}</li>
                    </ol>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="portfolioFilter">
                        @foreach($category as $row)
                        <a href="#" data-filter="*" class="current">{{$row->category_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                   <div class="price_card text-center">
                    <ul class="price-features" style="border:1px solid gray;">
                        <table class="table">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-white">Name</th>
                                    <th class="text-white">Qty</th>
                                    <th class="text-white">Price</th>
                                    <th class="text-white">Sub tutal</th>
                                    <th class="text-white">Del</th>
                                </tr>
                            </thead>
                            @php
                                $cart=Cart::content();
                            @endphp
                            <tbody>
                               @foreach($cart as $prod)
                                <tr>
                                    <th>{{$prod->name}}</th>
                                    <th>
                                        {{-- start form --}}
                                        <form action="{{url('/updateCart/'.$prod->rowId)}}" method="POST">
                                        @csrf
                                        <input type="number" value="{{$prod->qty}}" name="qty" style="width:40px;">
                                        <button type="submit" class="btn btn-sm btn-success "
                                        style="margin: 0px;"><i class="fas fa-check"></i>
                                        </button>
                                        </form>
                                        {{-- end form --}}
                                    </th>
                                    <th>{{$prod->price}}</th>
                                    <th>{{$prod->price*$prod->qty}}</th>
                                    <th><a href="{{URL::to('cartRemove/'.$prod->rowId)}} " class="text-danger">
                                     <i class="fas fa-trash-alt"></i></a>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </ul>
                    <div class="pricing-footer bg-primary">
                        <p> Quantity :{{Cart::count()}} </p>
                        <p> Sub Tutal :{{Cart::subtotal()}} </p>
                        <p> vat : {{Cart::tax()}}</p>
                        <hr>
                        <p><h2 class="text-white">Total:</h2><h2 class="text-white">{{Cart::total()}}</h2></p>

                    </div>
                    <br>
                        {{-- form start --}}
                        <form method="POST" action="{{ url('/CartInvoice') }}">
                        @csrf
                        <div class="penel">
                            @if ($errors->any())
                             <div class="alert alert-danger">
                               <ul>
                                 @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                                 @endforeach
                               </ul>
                             </div>
                            @endif
                            <h4 class="text-active">Select Customer
                            <a href="#"class="btn btn-sm btn-primary waves-effect waves-light pull-right"
                             data-toggle="modal" data-target="#con-close-modal">Add Customer</a>
                            </h4>
                                @php
                                    $customer=DB::table('customers')->get();
                                @endphp
                            <select class="form-control">
                                <option disabled="" selected="">Select Customer</option>
                                @foreach($customer as $cus)
                                <option value="{{$cus->id}}">{{$cus->name}}</option>
                                @endforeach
                            </select>
                        </div>

                       <button type="submit" class="btn btn-success">Create Invoice</button>
                    </div>
                    <!-- end Pricing_card -->
                </div>
                {{-- end col --}}
                         </form>
                  {{-- end form --}}
                <div class="col-lg-6">
                    <table id="datatable" class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product_Name</th>
                                <th>Cetogory_Id</th>
                                <th>Product_Code</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $row)
                            <tr>
                                {{-- form start --}}
                                <form action="{{url('addCard')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$row->id}} ">
                                <input type="hidden" name="name" value="{{$row->product_name}} ">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="price" value="{{$row->selling_price}} ">
                                <td>
                                    {{-- <a href="#" style="font-size=30px"><i class="fas fa-plus-circle"></i></a> --}}
                                    <img src="{{URL::to($row->product_image)}}"
                                     width="60px" height="60px" alt="">
                                </td>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->category_id}}</td>
                                <td>{{$row->product_code}}</td>
                                <td><button type="submit" class="btn btn-sm btn-info">
                                <i class="fas fa-plus-circle"></i></button>
                               </td>
                              </form>
                              {{-- form end --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div> <!--end content page -->
{{-- customer add model --}}
<form action="{{url('/insertCustomers')}} " method="POST" enctype="multipart/form-data">
    @csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-white">Add a New Customer</h4>
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
                            <label for="field-4" class="control-label">Name</label>
                            <input type="text" class="form-control" id="field-4" name="name" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Phone</label>
                            <input type="text" class="form-control" id="field-6" name="phone" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Email</label>
                            <input type="email" class="form-control" id="field-5" name="email" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Address</label>
                            <input type="text" class="form-control" id="field-4" name="address" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">NID_NO</label>
                            <input type="text" class="form-control" id="field-4" name="nid_no" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Shop_name</label>
                            <input type="text" class="form-control" id="field-5" name="shop_name" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Account Holder</label>
                            <input type="text" class="form-control" id="field-5" name="account_holder" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Account Number</label>
                            <input type="text" class="form-control" id="field-4" name="account_no" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Branch Name</label>
                            <input type="text" class="form-control" id="field-4" name="branch_name" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Bank Name</label>
                            <input type="text" class="form-control" id="field-6" name="bank_name" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">City</label>
                            <input type="text" class="form-control" id="field-6" name="city" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Image</label>
                            <img id="image" src="{{URL::to('$row->image')}}"/>
                            <input type="file"  name="image" accept="image/*"  required onchange="readURL(this);">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
</form>
{{-- Jave SCript --}}
<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
