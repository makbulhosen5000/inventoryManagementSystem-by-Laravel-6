<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;


class cardController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    //add cart function is here....................
    public function addCard(Request $request)
    {
        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;
        $data['weight']=1;
        $add=Cart::add($data);
        if ($add) {
            $notification=array(
            'massage'=>'Cart Added Successfully',
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
    //Update cart function is here.............
    public function updateCart(Request $request, $rowId)
    {
          $qty=$request->qty;
          $update=Cart::update($rowId, $qty);
          if ($update) {
            $notification=array(
            'massage'=>'Cart Update Successfully',
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
    //Remove cart function is here..................
    public function cartRemove($rowId)
    {
        $remove=Cart::remove($rowId);
        if ($remove) {
            $notification=array(
            'massage'=>'Cart Remove Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        }else{
         $notification=array(
            'massage'=>'error',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        }

    }
    //create invoice function is here..................
    public function CartInvoice(Request $request)
    {
        $request->validate([

            ],
            [
                'cus_id.required' => 'Select A Customer First !',
            ]);
            $cus_id=$request->cus_id;
            $custom=DB::table('customers')->where('customer_id',$cus_id)->first();
            $contents=Cart::content();
            return view('CartInvoice', compact('custom','contents'));
        //  echo "<pre>";
        // print_r($custom);




    }
    public function finalInvoice(Request $request)
    {
       $data=array();
       $data['customer_id']=$request->customer_id;
       $data['order_date']=$request->order_date;
       $data['order_status']=$request->order_status;
       $data['total_products']=$request->total_products;
       $data['sub_total']=$request->sub_total;
       $data['vat']=$request->vat;
       $data['total']=$request->total;
       $data['payment_status']=$request->payment_status;
       $data['pay']=$request->pay;
       $data['due']=$request->due;

       $order_id=DB::table('orders')->insertGetId($data);
       $contents=Cart::content();

       $odata=array();
       foreach($contents as $content){
            $odata['order_id']=$order_id;
            $odata['product_id']=$content->id;
            $odata['quantity']=$content->qty;
            $odata['unitcost']=$content->price;
            $odata['total']=$content->total;

            $insert=DB::table('orderdetails')->insert($odata);
       }
            if ($insert) {
                $notification=array(
                'massage'=>' Successfully Orders Conformed | All products Delivered ',
                'alert-type'=>'success'
                 );
                 Cart::destroy();
               return Redirect()->route('pendingOrders')->with($notification);
            }else{
             $notification=array(
                'massage'=>'error exception',
                'alert-type'=>'success'
                 );
                return Redirect()->back()->with($notification);
            }
       }
}





