<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class categoriesController extends Controller
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

    //categories function is here....................
    public function addCategory()
    {
        return view('addCategory');
    }
    public function allCategory()
    {
        $cat=DB::table('categories')->get();
        return view('allCategory', compact('cat'));
    }
    //categories insert function is here............
    public function insertCategory(Request $request)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $category=DB::table('categories')->insert($data);
        if ($category) {
            $notification=array(
            'massage'=>'Successfully Inserted Category ',
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

    //categories delete function here...........
    public function deleteCategory($id)
    {
      $del=DB::table('categories')->where('id',$id)->delete();
      if ($del) {
        $notification=array(
        'massage'=>'Category Item Deleted',
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
    //categories edit function here........................
    public function editCategory($id)
    {
        $edt=DB::table('categories')->where('id', $id)->first();
        return view('editCategory', compact('edt'));
    }
    //categories update function here......................
    public function updateCategory(Request $request,$id)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $update=DB::table('categories')->where('id', $id)->update($data);
        if ($update) {
            $notification=array(
            'massage'=>'Category Item Update Successfully ',
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
