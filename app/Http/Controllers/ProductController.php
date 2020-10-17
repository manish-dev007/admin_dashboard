<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
{
    public function insert(Request $request)
    {	

        /*$request->validate([
            'pname' => 'required | max:255',
            'h1' => 'nullable | max:255',
            'meta_title' => 'nullable | max:255',
            'meta_description' => 'nullable | max:255',
        ]);*/
        
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

        if ($request->hasfile('pimg')) {
            $image = $request->file('pimg');        
            $file = $image->getClientOriginalName();
            $destinationPathorg = 'storage/app/products/';
            $image->move($destinationPathorg, $file);
            $file_img = 'products/'.$file;   
        }else{
            $file_img = '';
        }
        $data['pimg'] = $file_img;

        if ($request->hasfile('prel')) {
            foreach ($request->file('prel') as $file) {
                $file_n = $file->getClientOriginalName();
                $file->move($destinationPathorg, $file_n);
                $data_img[] = 'products/'.$file_n;
            }
            $img_all = implode(',',$data_img);
        }else{
            $img_all = '';
        }
        $data['prel'] = $img_all;
        
		
        $st = DB::table('products')->insert($data);

        if ($st)
        {
            return redirect('Products');
        }
    }
    public function add_product()
    {
        $product_categ = DB::table("category")->select('id', 'catname')->get();
        return view("pages/products/add_product", [
            'product_categ'=>$product_categ
        ]);
        return view('pages/products/add_product');
    }
    public function index()
    {

        $products = DB::table('products')
                    ->select('products.*','category.catname as cn')
                    ->leftjoin('category', 'category.id', '=','products.cid')
                    ->orderBy('products.id', 'desc')
                    ->get();
                    
        return view("pages.products.all_product", [
            'products'=>$products
            ]);
    }
    public function fetch_subcateg(Request $request)
    {
        $cat_id = $request->cat_id;
        $products = DB::table('subcategory')
                    ->where('cat_id','=',$cat_id)
                    ->get();
        return $products;
    }
    public function EditView($id)
    {
        $product_data = DB::table("products")->where('id', '=' ,$id)->get();
        $product_categ = DB::table("category")->select('id', 'catname')->get();
        return view("pages.products.edit_product", 
            [
                'product_data'=>$product_data, 
                'product_categ'=>$product_categ
            ]);
    }
    public function update(Request $request,$id)
    {	
        $data = array();

        $product_data = DB::table("products")->where('id', '=' ,$id)->get();
        $old_img = '';
        $old_prel_img = '';
        foreach ($product_data as $pimg) {
            $old_img = $pimg->pimg;
            $old_prel_img = $pimg->prel;
        }
        
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

        if ($request->hasfile('pimg')) {
            $image = $request->file('pimg');        
            $file = $image->getClientOriginalName();
            $destinationPathorg = 'storage/app/products/';
            $image->move($destinationPathorg, $file);
            $file_img = 'products/'.$file;   
        }else{
            $file_img = $old_img;
        }
        $data['pimg'] = $file_img;

        if ($request->hasfile('prel')) {
            foreach ($request->file('prel') as $file) {
                $file_n = $file->getClientOriginalName();
                $file->move($destinationPathorg, $file_n);
                $data_img[] = 'products/'.$file_n;
            }
            $img_all = implode(',',$data_img);
        }else{
            $img_all = $old_prel_img;
        }
        $data['prel'] = $img_all;

        $st = DB::table('products')
        ->where('id', $id)  
        ->update($data);  
        

        if ($st)
        {
            return redirect('Products');
        }
    }
    public function DeleteProduct(Request $request,$id)
    {
        $st = DB::table('products')
        ->where('id', $id)  
        ->delete();  
        

        if ($st)
        {
            return redirect('Products');
        }
    }
}
