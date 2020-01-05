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
                        <div class="panel-heading"><h3 class="panel-title">Update Company's Information</h3></div>
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
                            <form role="form" action="{{ url('/updateWebsite/'.$setting->id) }}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company_Name</label>
                                    <input type="text" class="form-control" name="company_name" value="{{($setting->company_name)}} "  required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Company_Email</label>
                                    <input type="email" class="form-control" name="company_email" value="{{($setting->company_email)}}"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Company_Address</label>
                                    <input type="text" class="form-control" name="company_address" value="{{($setting->company_address)}}"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Company_website</label>
                                    <input type="text" class="form-control" name="company_website" value="{{($setting->company_website)}}"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Phone</label>
                                    <input type="text" class="form-control" name="company_phone" value="{{($setting->company_phone)}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Mobile</label>
                                    <input type="text" class="form-control" name="company_mobile" value="{{($setting->company_mobile)}}"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Country</label>
                                    <input type="text" class="form-control" name="company_country" value="{{($setting->company_country)}}"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Zip_Code</label>
                                    <input type="text" class="form-control" name="company_zip_code" value="{{($setting->company_zip_code)}}"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword19">city</label>
                                    <input type="text" class="form-control" name="company_city" value="{{($setting->company_city)}} "required>
                                </div>
                                <div class="form-group">
                                	<img id="image" src="#" />
                                    <label for="exampleInputPassword11">Image</label>
                                    <input type="file"  name="company_logo" accept="image/*"  required onchange="readURL(this);">
                                </div>

                                <div class="form-group">
                                    <img  src="{{URL::to($setting->company_logo)}}"
                                     style="height:80px; width:80px;"/>
                                     <input type="hidden"  value="{{ $setting->company_logo }}">
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
