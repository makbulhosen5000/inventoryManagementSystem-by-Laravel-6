
@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! {{date("Y")}} </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">CodingDuck</a></li>
                        <li class="active">IT</li>
                    </ol>
                </div>
            </div>
            <div>
                <a href="{{route('januaryExpense')}} " class="btn btn-md btn-info">January</a>
                <a href="{{route('februaryExpense')}} " class="btn btn-md btn-success">February</a>
                <a href="{{route('marchExpense')}} " class="btn btn-md btn-danger">March</a>
                <a href="{{route('aprilExpense')}} " class="btn btn-md btn-primary">April</a>
                <a href="{{route('mayExpense')}} " class="btn btn-md btn-warning">May</a>
                <a href="{{route('juneExpense')}} " class="btn btn-md btn-success">June</a>
                <a href="{{route('julyExpense')}} " class="btn btn-md btn-info">July</a>
                <a href="{{route('augustExpense')}} " class="btn btn-md btn-warning">August</a>
                <a href="{{route('septemberExpense')}} " class="btn btn-md btn-primary">September</a>
                <a href="{{route('octoberExpense')}} " class="btn btn-md btn-danger">October</a>
                <a href="{{route('novemberExpense')}} " class="btn btn-md btn-success">November</a>
                <a href="{{route('decemberExpense')}} " class="btn btn-md btn-info">December</a>
            </div>

            <!-- Start Widget -->
            <div class="row">
                    <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title text-danger">{{date('F')}} Expenses:</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead class="bg-dark">
                                                    <tr>
                                                        <th>Details</th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($expense as $row)
                                                    <tr>
                                                        <td>{{$row->details}}</td>
                                                        <td>{{$row->date}}</td>
                                                        <td>{{$row->amount}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @php
                                            $month=date("F");
                                            $total=DB::table('expenses')->where('month', $month)->sum('amount');
                                            @endphp
                                            <h4 align="center" >Expense {{$total}} Taka</h4>
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
