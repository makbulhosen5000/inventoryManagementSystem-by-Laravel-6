
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
            @php
                 $date=date('d/m/y');
                 $expense=DB::table('expenses')->where('date',$date)->sum('amount');
            @endphp

            <!-- Start Widget -->
            <div class="row">
                    <div class="col-md-12">
                            <div class="panel panel-default">
                                    <h2 style= color:black align="center">Tutal:{{$expense}} </h2>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Today Expenses:
                                    <a href="{{route('addExpense')}} " class="btn btn-custom  bg-warning pull-right">Add New</a>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead class="bg-dark">
                                                    <tr>
                                                        <th>Details</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($today as $row)
                                                    <tr>
                                                        <td>{{$row->details}}</td>
                                                        <td>{{$row->amount}}</td>
                                                        <td>{{$row->date}}</td>

                                                        <td>
                                                            <a href="{{URL::to('/editTodayExpense/'.$row->id)}} " class="btn btn-info">Edit</a>
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
