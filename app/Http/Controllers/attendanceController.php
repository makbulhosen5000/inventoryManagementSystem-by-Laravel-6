<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendance;
class AttendanceController extends Controller
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
    //Take Attendance function is here.......................
    public function takeAttendance()
    {
    	$employees=DB::table('employees')->get();
    	return view('takeAttendance', compact('employees'));
    }
   //Insert Attendance function here....................
    public function insertAttendance(Request $request)
    {

        $date=$request->att_date;
        $att_date=DB::table('attendances')->where('att_date',$date)->first();
        if ($att_date) {
             $notification=array(
                 'massage'=>' Already Today Attendance Taken ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
        }else{

           foreach ($request->user_id as $id) {
            $data[]=[
                "user_id"=>$id,
                "attendance"=>$request->attendance[$id],
                "att_date" =>$request->att_date,
                "att_year" =>$request->att_year,
                "month"=>$request->month,
                "edit_date" =>date("d_m_y")

            ];
        }
        $att=DB::table('attendances')->insert($data);
         if ($att) {
                 $notification=array(
                 'massage'=>'Successfully Attendance Taken ',
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

    }
    //all attendance function here.................
    public function allAttendance()
    {
        $all_att=DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        return view('allAttendance', compact('all_att'));
    }
    //edit attendance function here.................
    public function editAttendance($edit_date)
    {
        $date=DB::table('attendances')->where('edit_date',$edit_date)->first();
        $data=DB::table('attendances')
            ->join('employees','attendances.user_id','employees.id')
            ->select('employees.name','employees.image','attendances.*')
            ->where('edit_date', $edit_date)->get();
         return view('editAttendance',compact('data','date'));
    }

    //update attendance function is here
    public function updateAttendance(Request $request)
    {
        foreach ($request->id as $id) {
            $data=[
                "attendance"=>$request->attendance[$id],
                "att_date" =>$request->att_date,
                "att_year" =>$request->att_year,
                "month"=>$request->month
            ];
            $attendance=Attendance::where(['att_date' =>$request->att_date,'id'=>$id])->first();
            $attendance->update( $data);
        }
        if ($attendance) {
            $notification=array(
            'massage'=>'Successfully Attendance Updated ',
            'alert-type'=>'success'
             );
           return Redirect()->route('allAttendance')->with($notification);
        }else{
         $notification=array(
            'massage'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        }

    }
    //view attendance function is here..............
    public function viewAttendance($edit_date)
    {
        $date=DB::table('attendances')->where('edit_date', $edit_date)->first();
        $data=DB::table('attendances')
            ->join('employees','attendances.user_id','employees.id')
            ->select('employees.name','employees.image','attendances.*')
            ->where('edit_date', $edit_date)->get();
         return view('viewAttendance',compact('data','date'));
    }

}
