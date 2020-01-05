<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class salariesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    $this->middleware('auth');
    }

    //add advanced salary here..............
    public function add_advanced_Salaries()
    {
        return view('add_advanced_Salaries');
    }

    //all advance salary here............
    public function all_advanced_Salaries()
    {
       $salary=DB::table('advance_salaries')
              ->join('employees','advance_salaries.emp_id','employees.id')
              ->select('advance_salaries.*','employees.name','employees.salary','employees.image')
              ->orderBy('id','DESC')
              ->get();
        return view('all_advanced_Salaries',compact('salary'));
    }

    //insert_advanced _Salaries here.........
    public function insert_advanced_Salaries(Request $request)
    {
        $month=$request->month;
        $emp_id=$request->emp_id;
        $advance=DB::table('advance_salaries')
                        ->where('month',$month)
                        ->where('emp_id',$emp_id)->first();
        if($advance===NULL){
        $data=array();
        $data['emp_id']=$request->emp_id;
        $data['month']=$request->month;
        $data['advance_salary']=$request->advance_salary;
        $data['year']=$request->year;

        $advance=DB::table('advance_salaries')->insert($data);
        if ($advance) {
            $notification=array(
            'massage'=>'Advance Paid Successfully ',
            'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
            'massage'=>'error ',
            'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }
        }else{
            $notification=array(
                'massage'=>'Oops !! Already Advanced Paid in this month',
                'alert-type'=>'error'
                    );
                return Redirect()->back()->with($notification);
        }
    }

    public function pay_salary()
    {
        $month=date("F",strtotime('-1 month'));
         $Salary=DB::table('advance_salaries')
                ->join('employees','advance_salaries.emp_id','employees.id')
                ->select('advance_salaries.*','employees.name','employees.salary','employees.image')
                ->where('month',$month)
                ->get();
        $employee=DB::table('employees')->get();
        return view('pay_salary',compact('employee'));
    }

}
