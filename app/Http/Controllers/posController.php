<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Dotenv\Regex\Success;

class posController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    //POS function here.................
    public function pos()
    {
        $product=DB::table('products')
                 ->join('categories','products.category_id','categories.id')
                 ->select('categories.category_name','products.*')
                 ->get();
        $customer=DB::table('customers')->get();
        $category=DB::table('categories')->get();
        return view('pos', compact('product','customer','category'));
    }
    public function pendingOrders()
    {
        $pending=DB::table('orders')
                ->join('customers','orders.id','customers.id')
                ->select('customers.name','orders.*')
                ->where('order_status','pending')->get();
        return view('pendingOrders',compact('pending'));

    }
    public function viewOrdersStatus($id)
    {
        $orders=DB::table('orders')
        ->join('customers','orders.id','customers.id')
        ->select('customers.*','orders.*')
        ->where('orders.id', $id)
        ->first();

        $order_details=DB::table('orderdetails')
                      ->join('products','orderdetails.product_id','products.id')
                      ->select('orderdetails.*','products.product_name','products.product_code')
                      ->where('orderdetails.id',$id)
                      ->get();
        return view('orderConfirmation',compact('orders','order_details'));

    }
    //posDONE function is here...........................
    public function posDone($id)
    {
        $approve=DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);
        if ($approve) {
            $notification=array(
            'massage'=>' Successfully Invoice Created | please deliver the product with accepted status ',
            'alert-type'=>'success'
             );
           return Redirect()->route('home')->with($notification);
        }else{
         $notification=array(
            'massage'=>'error exception',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        }
    }
    public function successOrders()
    {
        $success=DB::table('orders')
                ->join('customers','orders.id','customers.id')
                ->select('customers.name','orders.*')
                ->where('order_status','success')->get();
        return view('successOrders',compact('success'));
    }

}


