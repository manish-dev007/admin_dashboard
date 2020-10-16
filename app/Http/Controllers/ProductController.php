<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
{
    public function insert(Request $request)
    {
		
		
        $data = array();

        $data['pname'] = $request->pname;
        $data['sname'] = $request->sname;
        $data['cid'] = $request->catname;
        $data['sid'] = $request->subcatname;
        $data['stock'] = $request->ostock;
        $data['ptax'] = $request->ptax;
        $data['status'] = $request->ppuborun;
        $data['popular'] = $request->popular;
        $data['psdesc'] = $request->psdesc;
        $data['pgms'] = $request->pgms;
        $data['pprice'] = $request->pprice;
        $data['discount'] = $request->discount_percentage;
        $data['date'] = date('Y-m-d H:i:s');

        
        $image = $request->file('pimg');

        $image_name = time();


        $destinationPathorg = 'storage/app/product_pics/';

        //$image->move($destinationPathorg, $image_name);
       
        $data['pimg'] = $image_name;
        
        
		
        $st = DB::table('product')->insert($data);

        if ($st)
        {
            return Redirect()->route('product.home')->withsuccess('Product Added Successfully.');
        }
        else
        {
            return Redirect()->route('product.home')->witherror('Error! Product Not Added.');
        }
    }
    public function show()
    {
        return view('pages/products/add_product');
    }
}
