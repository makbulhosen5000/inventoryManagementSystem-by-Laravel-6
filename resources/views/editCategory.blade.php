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
                        <li><a href="#">CodigDuck</a></li>
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
                        <div class="panel_heading btn btn-block bg-info"><h3 class="panel_title text-white">Edit Category</h3></div>
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
                            <form role="form" action="{{ url('/updateCategory/'.$edt->id) }}" method="post">
                            	@csrf


                                <div class="form-group">
                                    <label for="exampleInputPassword21">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" value="{{$edt->category_name}}" required>
                                    </select>
                                </div>
                              <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->

    </div> <!-- content -->
</div>

@endsection



