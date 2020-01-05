<?php

namespace App\Http\Controllers;
use App\Exports\productsExport;
use App\Imports\productsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use DB;


class productsController extends Controller
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
    //add product function is here..............
    public function addProducts(){
        return view('addProducts');
    }
    //all product function is here..............
    public function allProducts(){
        $pro=DB::table('products')->get();
        return view('allProducts',compact('pro'));
    }
    //insert product function is here...........
    public function insertProducts(Request $request){
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:products|max:255',
            'category_id' => 'required|unique:products|max:255',
            'supplier_id' => 'required|unique:products|max:255',
            'product_garage' => 'required',
            'product_route' => 'required',
            'buying_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'product_image' => 'required',

         ]);
         $data=array();
         $data['product_name']=$request->product_name;
         $data['product_code']=$request->product_code;
         $data['category_id']=$request->category_id;
         $data['supplier_id']=$request->supplier_id;
         $data['category_id']=$request->category_id;
         $data['product_garage']=$request->product_garage;
         $data['product_route']=$request->product_route;
         $data['buying_date']=$request->buying_date;
         $data['expire_date']=$request->expire_date;
         $data['buying_price']=$request->buying_price;
         $data['selling_price']=$request->selling_price;
         $image=$request->file('product_image');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/Products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;
                $product=DB::table('products')
                         ->insert($data);
              if ($product) {
                 $notification=array(
                 'massage'=>'Successfully Product Inserted ',
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
    public function deleteProducts($id)
    {
        $delete=DB::table('products')->where('id',$id)->first();
        $image=$delete->product_image;
        unlink($image);
        $deleteProduct=DB::table('products')->where('id',$id)->delete();
        if ($deleteProduct) {
        $notification=array(
        'massage'=>'Product item Delete Successfully',
        'alert-type'=>'success'
         );
        return Redirect()->route('allProducts')->with($notification);
        }else{
        $notification=array(
        'massage'=>'error ',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

    }
    public function viewProducts($id)
    {
        $product=DB::table('products')
             ->join('categories','products.category_id','categories.id')
             ->join('suppliers','products.supplier_id','suppliers.id')
             ->select('categories.category_name','products.*','suppliers.name')
             ->where('products.id',$id)
             ->first();
        return view('viewProducts', compact('product'));
    }
    public function editProducts($id)
    {
        $prod=DB::Table('products')->where('id',$id)->first();
        return view('editProducts', compact('prod'));

    }
    //update product function here....................
    public function updateProducts(Request $request,$id)
    {
       $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['category_id']=$request->category_id;
        $data['supplier_id']=$request->supplier_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buying_date']=$request->buying_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;

        $image=$request->file('product_image');

      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/products/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['product_image']=$image_url;
             $img=DB::table('products')->where('id',$id)->first();
             $image_path = $img->product_image;
             $done=unlink($image_path);
          $product=DB::table('products')->where('id',$id)->update($data);
         if ($product) {
                $notification=array(
                'massage'=>'Product Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allProducts')->with($notification);
            }else{
              return Redirect()->back();
             }
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['product_image']=$oldphoto;
          $user=DB::table('products')->where('id',$id)->update($data);
         if ($user) {
                $notification=array(
                'massage'=>'Product Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allProducts')->with($notification);
            }else{
              return Redirect()->back();
             }
          }
       }
    }

    //products import function is here...............
    public function importProducts()
    {
        return view('importProducts');
    }
    public function export()
    {
        return Excel::download(new productsExport, 'users.xlsx');
    }
    //products export function is here...............
    public function import(Request $request)
    {
       $import= Excel::import(new productsImport, $request->file('import_file'));
       if ($import) {
        $notification=array(
        'massage'=>'Product Imported Successfully',
        'alert-type'=>'success'
         );
       return Redirect()->route('allProducts')->with($notification);
       }else{
       return Redirect()->back();
       }
    }





}
