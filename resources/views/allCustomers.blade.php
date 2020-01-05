
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
                                    <h3 class="panel-title btn btn-success bg-success">All Customers</h3>
                                <a href="{{route('addCustomers')}} " class="btn btn-custom bg-warning pull-right">Add New</a>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>E-mail</th>
                                                        <th>Address</th>
                                                        <th>City</th>
                                                        <th>Image</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    @foreach($customers as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td>{{$row->phone}}</td>
                                                        <td>{{$row->email}}</td>
                                                        <td>{{$row->address}}</td>
                                                        <td>{{$row->city}}</td>
                                                        <td><img src="{{$row->image}} "
                                                            style="height:80px; width:80px" alt="">
                                                        </td>
                                                        <td>
                                                            <a href="{{URL::to('editCustomers/'.$row->id)}} " class="btn btn-info">Edit</a>
                                                            <a href="{{URL::to('deleteCustomers/'.$row->id)}} " id="delete" class="btn btn-danger">Delete</a>
                                                            <a href="{{URL::to('viewCustomers/'.$row->id)}} "class="btn btn-primary">View</a>
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
