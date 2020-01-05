<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class expensesController extends Controller
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




    //add expense function here..........
    public function addExpense()
    {
        return view('addExpense');
    }
    //insert expense function here........
    public function insertExpense(Request $request)
    {
        $validatedData = $request->validate([
            'details' => 'required|unique:expenses|max:255',
            'amount' => 'required',
            'date' => 'required',
            'year' => 'required',
        ]);
        $data=array();
    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['date']=$request->date;
    	$data['month']=$request->month;
    	$data['year']=$request->year;
     	$exp=DB::table('expenses')->insert($data);
    	if ($exp) {
                 $notification=array(
                 'massage'=>'Successfully Expense Inserted ',
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
    }
    //today expense function here...........
    public function todayExpense()
    {
        $date=date('d/m/y');
        $today=DB::table('expenses')->where('date', $date)->get();
        return view('todayExpense',compact('today'));

    }
    //edit today expense function here.......
    public function editTodayExpense($id)
    {
        $edit=DB::table('expenses')->where('id',$id)->first();
        return view('editTodayExpense',compact('edit'));
    }
    //update today expense function here..........
    public function updateTodayExpense(Request $request,$id)
    {
        $validatedData = $request->validate([
            'details' => 'required|unique:expenses|max:255',
            'amount' => 'required',
            'date' => 'required',
            'year' => 'required',
        ]);
        $data=array();
    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['date']=$request->date;
    	$data['month']=$request->month;
    	$data['year']=$request->year;
     	$exp=DB::table('expenses')->where('id',$id)->update($data);
    	if ($exp) {
                 $notification=array(
                 'massage'=>'Successfully Expense Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('todayExpense')->with($notification);
             }else{
              $notification=array(
                 'massage'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }
    //monthly expense function here....................
    public function monthlyExpense()
    {
        $month=date("F");
        $expense=DB::table('expenses')->where('month', $month)->get();
        return view('monthlyExpense',compact('expense'));
    }
    //months expense function start form here.................
    public function januaryExpense(){
        $month="January";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function februaryExpense(){
        $month="February";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function marchExpense(){
        $month="March";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function aprilExpense(){
        $month="April";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function mayExpense(){
        $month="May";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function juneExpense(){
        $month="June";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function julyExpense(){
        $month="July";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function augustExpense(){
        $month="August";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function septemberExpense(){
        $month="September";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function octoberExpense(){
        $month="October";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function novemberExpense(){
        $month="November";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
    public function decemberExpense(){
        $month="December";
         $expense=DB::table('expenses')->where('month', $month)->get();
         return view('monthlyExpense',compact('expense'));
    }
     //yearly expense function here....................
     public function yearlyExpense()
     {
         $year=date("Y");
         $expense=DB::table('expenses')->where('year', $year)->get();
         return view('yearlyExpense',compact('expense'));
     }



}
