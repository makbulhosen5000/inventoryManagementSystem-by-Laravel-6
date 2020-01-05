
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
                                    <h3 class="panel-title text-danger">Take Attendance:<a href="{{ route('allAttendance') }}"
                                        class="btn btn-sm btn-success text-log pull-right">All Attendance</a></h3>
                                </div>
                                <h3 class="text-success" align="center">{{date("d/m/y")}} </h3>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered ">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Image</th>
                                                        <th>Attendance</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <form action="{{url('/insertAttendance')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                    @foreach($employees as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td><img src="{{$row->image}} "
                                                            style="height:80px; width:80px" alt="">
                                                            <input type="hidden" name="user_id[]"value="{{$row->id}}">
                                                        </td>
                                                        <td>
                                                            <input type="radio" value="Present" required="" name="attendance[{{($row->id)}}]">Present
                                                            <input type="radio"value="Absence" name="attendance[{{($row->id)}}]">Absence
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="att_date" value="{{date('d/m/y')}} ">
                                                            <input type="hidden" name="att_year" value="{{date('Y')}}">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-success">Take Attendance</button>
                                        </form>
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
