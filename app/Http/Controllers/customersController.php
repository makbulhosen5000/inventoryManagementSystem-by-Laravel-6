<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\customersModel;

class customersController extends Controller
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
    //add customer here........
    public function addCustomers()
    {
        return view('addCustomers');
    }
    //all customer store here........
    public function insertCustomers(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|max:255',
        'email' => 'required|max:55',
        'address' => 'required',
        'nid_no' => 'required|max:55',
        'shop_name' => 'required',
        'account_holder' => 'required',
        'account_no' => 'required',
        'bank_name' => 'required',
        'branch_name' => 'required',
        'city' => 'required',
        'image' => 'required',
        ]);
        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['nid_no']=$request->nid_no;
        $data['shop_name']=$request->shop_name;
        $data['account_holder']=$request->account_holder;
        $data['account_no']=$request->account_no;
        $data['branch_name']=$request->branch_name;
        $data['bank_name']=$request->bank_name;
        $data['city']=$request->city;
        $image=$request->file('image');

        if ($image) {
            $image_name= str_random(12);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['image']=$image_url;
                $customers=DB::table('customers')
                         ->insert($data);
              if ($customers) {
                 $notification=array(
                 'massage'=>'Customer Inserted Successfully',
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

              return Redirect()->back();

            }
        }else{
        	  return Redirect()->back();
        }
    }
//all customers return here...........
public function allCustomers()
{
     $customers=DB::table('customers')->get();
   //$customers=customersModel::all();
    return view('allCustomers', compact('customers'));
}

//view a single customer
public function viewCustomers($id)
{
  $single=DB::table('customers')->where('id',$id)->first();
  return view('viewCustomers',compact('single'));
}
//delete a single customers
public function deleteCustomers($id)
{
    $delete=DB::table('customers')->where('id',$id)->first();
    $image=$delete->image;
    unlink($image);
    $deleteUser=DB::table('customers')->where('id',$id)->delete();
    if ($deleteUser) {
        $notification=array(
        'massage'=>'Customer Delete Successfully',
        'alert-type'=>'success'
         );
       return Redirect()->route('addCustomers')->with($notification);
    }else{
     $notification=array(
        'massage'=>'error ',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

}

//edit a single customer for showing data
public function editCustomers($id)
{
    $edit=DB::table('customers')->where('id',$id)->first();
    return view('editCustomers',compact('edit'));
}

//update a single customer
public function updateCustomers(Request $request,$id)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|max:255',
        'email' => 'required|max:55',
        'address' => 'required',
        'nid_no' => 'required|max:55',
        'shop_name' => 'required',
        'account_holder' => 'required',
        'account_no' => 'required',
        'bank_name' => 'required',
        'branch_name' => 'required',
        'city' => 'required',
        'image' => 'required',
        ]);
        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['nid_no']=$request->nid_no;
        $data['shop_name']=$request->shop_name;
        $data['account_holder']=$request->account_holder;
        $data['account_no']=$request->account_no;
        $data['bank_name']=$request->bank_name;
        $data['branch_name']=$request->branch_name;
        $data['city']=$request->city;
        $data['phone']=$request->phone;
        $image=$request->file('image');

        if ($image) {
            $image_name= str_random(12);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['image']=$image_url;
                $employees=DB::table('customers')->where('id',$id)->first();
                $image=$employees->image;
                $done=unlink($image);
                $user=DB::table('customers')->where('id',$id)->update($data);
              if ($user) {
                 $notification=array(
                 'massage'=>'Customer Updated Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('allCustomers')->with($notification);
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
