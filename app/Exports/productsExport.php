<?php

namespace App\Exports;

use App\products;
use Maatwebsite\Excel\Concerns\FromCollection;

class productsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return products::select('product_name','product_code','category_id','supplier_id','product_garage','product_route','buying_date','expire_date','buying_price','selling_price','product_image')->get();
    }
    public function export()
    {
        return Excel::download(new productsExport, 'users.xlsx');
    }
}
