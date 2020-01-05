<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\suppliersModel;

class suppliersController extends Controller
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
    //add supplier here........
    public function addSuppliers()
    {
        return view('addSuppliers');
    }
    //all supplier store here........
    public function insertSuppliers(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|max:255',
        'email' => 'required|max:55',
        'address' => 'required',
        'nid_no' => 'required|max:55',
        'shop_name' => 'required',
        'type' => 'required',
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
        $data['type']=$request->type;
        $data['city']=$request->city;
        $data['phone']=$request->phone;
        $image=$request->file('image');

        if ($image) {
            $image_name= str_random(12);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/suppliers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['image']=$image_url;
                $customers=DB::table('suppliers')
                         ->insert($data);
              if ($customers) {
                 $notification=array(
                 'massage'=>'Supplier Inserted Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('addSuppliers')->with($notification);
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
//all supplier return here...........
public function allSuppliers()
{
     $suppliers=DB::table('suppliers')->get();
   //$customers=suppliersModel::all();
    return view('allSuppliers', compact('suppliers'));
}

//view a single supplier
public function viewCustomers($id)
{
  $single=DB::table('customers')->where('id',$id)->first();
  return view('viewSuppliers',compact('single'));
}
//delete a single supplier
public function deleteSuppliers($id)
{
    $delete=DB::table('suppliers')->where('id',$id)->first();
    $image=$delete->image;
    unlink($image);
    $deleteUser=DB::table('suppliers')->where('id',$id)->delete();
    if ($deleteUser) {
        $notification=array(
        'massage'=>'Supplier Delete Successfully',
        'alert-type'=>'success'
         );
       return Redirect()->route('addSuppliers')->with($notification);
    }else{
     $notification=array(
        'massage'=>'error ',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

}

//edit a single supplier for showing data
public function editSuppliers($id)
{
    $edit=DB::table('suppliers')->where('id',$id)->first();
    return view('editSuppliers',compact('edit'));
}

//update a single supplier
public function updateSuppliers(Request $request,$id)
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
        'type' => 'required',
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
        $data['type']=$request->city;
        $data['phone']=$request->phone;
        $image=$request->file('image');

        if ($image) {
            $image_name= str_random(12);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/suppliers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['image']=$image_url;
                $employees=DB::table('suppliers')->where('id',$id)->first();
                $image=$employees->image;
                $done=unlink($image);
                $user=DB::table('suppliers')->where('id',$id)->update($data);
              if ($user) {
                 $notification=array(
                 'massage'=>'Supplier Updated Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('allSuppliers')->with($notification);
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



