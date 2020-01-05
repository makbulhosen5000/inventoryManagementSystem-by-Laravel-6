<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class settingController extends Controller
{
    //setting function is here...............................
    public function settings()
    {
        $setting=DB::table('settings')->first();
        return view('settings',compact('setting'));
    }
    //update function is here........................
    public function updateWebsite(Request $request, $id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|max:255',
            'company_logo' => 'required',
            'company_address' => 'required|max:55',
            'company_website' => 'required|max:40',
            'company_email' => 'required',
            'company_phone' => 'required|max:55',
            'company_mobile' => 'required|max:55',
            'company_city' => 'required',
            'company_country' => 'required',
            'company_zip_code' => 'required'
            ]);

            $data=array();
            $data['company_name']=$request->company_name;
            $data['company_logo']=$request->company_logo;
            $data['company_website']=$request->company_website;
            $data['company_email']=$request->company_email;
            $data['company_phone']=$request->company_phone;
            $data['company_mobile']=$request->company_mobile;
            $data['company_city']=$request->company_city;
            $data['company_country']=$request->company_country;
            $data['company_zip_code']=$request->company_zip_code;
            $image=$request->file('company_logo');

            if ($image) {
                $image_name= str_random(12);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/company/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                if ($success) {
                    $data['company_logo']=$image_url;
                    $setting=DB::table('settings')->where('id',$id)->first();
                    $image=$setting->company_logo;
                    $done=unlink($image);
                    $company=DB::table('settings')->where('id',$id)->update($data);
                  if ($company) {
                     $notification=array(
                     'massage'=>'Information Updated Successfully',
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

}
