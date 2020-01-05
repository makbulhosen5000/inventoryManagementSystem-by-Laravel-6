
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
                                    <h3 class="panel-title btn btn-success bg-primary">Pay Salary
                                        <h3 class="pull-right text-info">{{date("F Y")}} </h3>
                                    </h3>

                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead class="bg-warning">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>salary</th>
                                                        <th>Month</th>
                                                        {{-- <th>Advance</th> --}}
                                                        <th>Image</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    //start return advance salary of employee


                                                @endphp
                                                <tbody>
                                                    @foreach($employee as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td>{{$row->salary}}</td>
                                                        <td><span class="badge badge-success ">{{date("F Y",strtotime('-1 month') )}}</span></td>
                                                        {{-- <td>{{$row->advance_salary}}</td> --}}
                                                        <td><img src="{{$row->image}} "
                                                            style="height:80px; width:80px" alt="">
                                                        </td>
                                                        <td>
                                                            <a href="# "class="btn btn-primary ">Pay Now</a>
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
