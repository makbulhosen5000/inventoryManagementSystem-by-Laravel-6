<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\employeesModel;
use DB;



class employeesController extends Controller
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
/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Http\Response
 */
//add employees here................
public function addEmployees()
{
    return view('add_employees');
}

//insert employees here.............
public function insertEmployee(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|max:255',
        'email' => 'required|unique:employees|max:55',
        'address' => 'required',
        'nid_no' => 'required|unique:employees|max:55',
        'experience' => 'required',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
        'image' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['nid_no']=$request->nid_no;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image=$request->file('image');

        if ($image) {
            $image_name= str_random(12);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employees/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['image']=$image_url;
                $employees=DB::table('employees')
                         ->insert($data);
              if ($employees) {
                 $notification=array(
                 'massage'=>'Employee Inserted Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('addEmployees')->with($notification);
             }else{
              $notification=array(
                 'massage'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }

            }else{

              return Redirect()->back();

            }
        }else{
        	  return Redirect()->back();
        }
    }
//all employees return here...........
public function allEmployees()
{
     $employees=DB::table('employees')->get();
   //$employees=employeesModel::all();
    return view('all_employees', compact('employees'));
}

//view a single employee
public function viewEmployees($id)
{
  $single=DB::table('employees')->where('id',$id)->first();
  return view('viewEmployees',compact('single'));
}
//delete a single employee
public function deleteEmployees($id)
{
    $delete=DB::table('employees')->where('id',$id)->first();
    $image=$delete->image;
    unlink($image);
    $deleteUser=DB::table('employees')->where('id',$id)->delete();
    if ($deleteUser) {
        $notification=array(
        'massage'=>'Employee Delete Successfully',
        'alert-type'=>'success'
         );
       return Redirect()->route('allEmployees')->with($notification);
    }else{
     $notification=array(
        'massage'=>'error ',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

}

//edit a single employee for showing data
public function editEmployees($id)
{
    $edit=DB::table('employees')->where('id',$id)->first();
    return view('editEmployees',compact('edit'));
}

//update a single employee
public function updateEmployees(Request $request,$id)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|max:255',
        'email' => 'required|max:55',
        'address' => 'required',
        'nid_no' => 'required|max:55',
        'experience' => 'required',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
        'image' => 'required',
        ]);
        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['nid_no']=$request->nid_no;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $data['phone']=$request->phone;
        $image=$request->file('image');

        if ($image) {
            $image_name= str_random(12);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employees/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['image']=$image_url;
                $employees=DB::table('employees')->where('id',$id)->first();
                $image=$employees->image;
                $done=unlink($image);
                $user=DB::table('employees')->where('id',$id)->update($data);
              if ($user) {
                 $notification=array(
                 'massage'=>'Employee Updated Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('allEmployees')->with($notification);
             }else{
              $notification=array(
                 'massage'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }

            }else{

              return Redirect()->back();

            }
        }else{
        	  return Redirect()->back();
        }
    }




}




