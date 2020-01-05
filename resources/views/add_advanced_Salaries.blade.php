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
                    <div class="panel panel-success">
                        <div class="panel-heading"><h3 class="panel-title text-white btn btn-block">Advace Salary Provide</h3></div>
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
                            <form role="form" action="{{ url('/insert_advanced_Salaries') }}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <div class="form-group">
                                    <label for="exampleInputPassword17">Employee</label>
                                    @php
                                        $emp=DB::table('employees')->get();
                                    @endphp
                                    <select name="emp_id" id="" class="form-control">
                                        @foreach($emp as $row)
                                           <option value="{{$row->id}} ">{{$row->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="month">Month</label>
                                <select name="month" id="" class="form-control">
                                        <option disabled="" selected="">Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="Jyly">July</option>
                                        <option value="August">August</option>
                                        <option value="October">October</option>
                                        <option value="Nobember">Nobember</option>
                                        <option value="December">December</option>
                                </select>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Advace Salary</label>
                                    <input type="text" name="advance_salary" class="form-control" placeholder="advace salary" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Year</label>
                                    <input type="text" name="year" class="form-control" placeholder="year" required>
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



