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
                        <div class="panel-heading"><h3 class="panel-title">Add Product
                            <a href="{{('importProducts')}} " class="btn btn-sm btn-danger pull-right">Import Product</a>
                        </h3></div>

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
                            <form role="form" action="{{ url('/insertProducts') }}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product_Name</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="product name"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Product_Code</label>
                                    <input type="text" class="form-control" name="product_code" placeholder="product code"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Category</label>
                                    @php
                                        $cat=DB::table('categories')->get();
                                    @endphp
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($cat as $row)
                                        <option value="{{$row->id}}">{{$row->category_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Supplier</label>
                                    @php
                                        $sup=DB::table('suppliers')->get();
                                    @endphp
                                    <select name="supplier_id" id="" class="form-control">
                                            @foreach($sup as $row)
                                        <option value="{{$row->id}} ">{{$row->name}} </option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword19">Godown</label>
                                    <input type="text" class="form-control" name="product_garage" placeholder="product_garage"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword17">Product_Route</label>
                                    <input type="text" class="form-control" name="product_route" placeholder="product_route"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword41">Buying_Date</label>
                                    <input type="date" class="form-control" name="buying_date"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Expire_Date</label>
                                    <input type="date" class="form-control" name="expire_date"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Buying_Price</label>
                                    <input type="text" class="form-control" name="buying_price" placeholder="buying_price" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Selling_Price</label>
                                    <input type="text" class="form-control" name="selling_price" placeholder="selling_price" required>
                                </div>
                                <div class="form-group">
                                	<img id="image" src="#" />
                                    <label for="exampleInputPassword11">Product_Image</label>
                                    <input type="file"  name="product_image" accept="image/*"  required onchange="readURL(this);">
                                </div>

                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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
