
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
                    <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title btn btn-success bg-success">All Category</h3>
                                <a href="{{route('addCategory')}} " class="btn btn-custom bg-warning pull-right">Add Category</a>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($cat as $row)
                                                    <tr>
                                                        <td>{{$row->id}}</td>
                                                        <td>{{$row->category_name}}</td>

                                                        <td>

                                                            <a href="{{URL::to('/editCategory/'.$row->id)}} " class="btn btn-info">Edit</a>
                                                            <a href="{{URL::to('/deleteCategory/'.$row->id)}} " id="delete" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
            {{-- end row --}}
        </div> <!-- container -->

    </div> <!-- content -->
</div>


@endsection
