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
                    <div class="panel panel-success">
                        <div class="panel_heading btn btn-block bg-info"><h3 class="panel_title text-white">Import Product
                        <a href="{{route('export')}}" class="btn btn-danger pull-right">Download XLSX</a></h3>
                    </div>
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
                            <form role="form" action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                            	@csrf


                                <div class="form-group">
                                    <label for="exampleInputPassword21">XLSX File Download</label>
                                    <input type="file" name="import_file" class="form-control" required>
                                    </select>
                                </div>
                              <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                            </form>
                        </div><!-- panel-body -->
                        <div class="container ">
                            <strong class="text-danger">Please download XLSX file and your can edit then again upload it and also your import another XLSX file| Thank You</strong>
                        </div>
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div>

@endsection



