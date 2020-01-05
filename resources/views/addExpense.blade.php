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
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title btn btn-block bg-info text-white ">Add Expense</h3></div>
                        <a href="monthlyExpense" class="btn btn-custom btn-lg pull-right">This Month</a>
                        <a href="{{route('todayExpense')}}" class="btn btn-custom btn-lg pull-right">Today's Expenses</a>
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
                            <form role="form" action="{{ url('/insertExpense') }}" method="post">
                            	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Expense Details</label>
                                    <textarea class="form-control" name="details" id="" cols="#" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Amount</label>
                                    <input type="text" class="form-control" name="amount" placeholder="amount"required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="date" value="{{date("d/m/y")}}"required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="month" value="{{date("F")}}">
                                    <input type="hidden" class="form-control" name="year" value="{{date("Y")}}">
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->

    </div> <!-- content -->
</div>

@endsection
