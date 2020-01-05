
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
                                    <h3 class="panel-title">All Advance Salary:</h3>
                                <a href="{{route('add_advanced_Salaries')}} " class="btn btn-custom bg-warning pull-right">Add Advance Salary</a>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>salary</th>
                                                        <th>Month</th>
                                                        <th>Advance</th>
                                                        <th>Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($salary as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td>{{$row->salary}}</td>
                                                        <td>{{$row->month}}</td>
                                                        <td>{{$row->advance_salary}}</td>
                                                        <td><img src="{{$row->image}} "
                                                            style="height:80px; width:80px" alt="">
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
