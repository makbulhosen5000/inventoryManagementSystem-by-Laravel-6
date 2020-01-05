
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
                                    <h3 class="panel-title">All Attendences <a href="{{route('takeAttendance')}} "
                                        class="btn btn-sm btn-warning text-white pull-right">Take New</a></h3>

                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead class="bg-warning">
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sl=1;
                                                    ?>
                                                    @foreach($all_att as $row)
                                                    <tr>
                                                        <td>{{$sl++}}</td>
                                                        <td>{{$row->edit_date}}</td>

                                                        <td>
                                                            <a href="{{URL::to('/editAttendance/'.$row->edit_date)}} " class="btn btn-info">Edit</a>
                                                            <a href="{{URL::to('/viewAttendance/'.$row->edit_date)}} " class="btn btn-success">View</a>
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
