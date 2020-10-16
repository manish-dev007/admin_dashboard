<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('pages/products/all_product');
    }
    public function add_product()
    {
        return view('pages/products/add_product');
    }
}
