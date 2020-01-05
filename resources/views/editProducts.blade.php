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
                        <div class="panel-heading"><h3 class="panel-title">Edit Product</h3></div>
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
                            <form role="form" action="{{ url('/updateProducts/'.$prod->id) }}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product_Name</label>
                                    <input type="text" class="form-control" name="product_name" value="{{ $prod->product_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Produt_Code</label>
                                    <input type="text" class="form-control" name="product_code" value="{{ $prod->product_code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Category</label>
                                    @php
                                    $cat=DB::table('categories')->get();
                                    @endphp
                                    <select name="category_id" class="form-control">
                                    	@foreach($cat as $row)
                              <option value="{{ $row->id }}" <?php if($prod->category_id==$row->id) { echo "selected";} ?> >{{ $row->category_name }}</option>
                                    	@endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword21">Supplier</label>
                                    @php
                                    $sup=DB::table('suppliers')->get();
                                    @endphp
                                    <select name="supplier_id" class="form-control">
                                    	@foreach($sup as $row)
                                    	 <option value="{{ $row->id }}" <?php if($prod->supplier_id==$row->id) { echo "selected";} ?> >{{ $row->name }}</option>
                                    	@endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Godown</label>
                                    <input type="text" class="form-control" name="product_garage" value="{{ $prod->product_garage }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword17">Product_Route</label>
                                    <input type="text" class="form-control" name="product_route" value="{{ $prod->product_route }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword41">Buying_Date</label>
                                    <input type="date" class="form-control" name="buying_date"  required value="{{ $prod->buying_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Expire_Date </label>
                                    <input type="date" class="form-control" name="expire_date"  required value="{{ $prod->expire_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">Buying_Price</label>
                                    <input type="text" class="form-control" name="buying_price" value="{{ $prod->buying_price }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">Selling_Price</label>
                                    <input type="text" class="form-control" name="selling_price" value="{{ $prod->selling_price }}" required>
                                </div>
                                <div class="form-group">
                                	<img id="image" src="#" />
                                    <label for="exampleInputPassword11">Product_Image</label>
                                    <input type="file"  name="product_image" accept="image/*"   onchange="readURL(this);">
                                </div>
                                <input type="hidden" name="old_photo" value="{{ $prod->product_image }}">
                               <div class="form-group">
                                    <label for="exampleInputPassword12">Old_Photo</label>
                                   <img src="{{ URL::to($prod->product_image) }}" style="height: 80px; width: 100px;">
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->

    </div> <!-- content -->
</div>

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
