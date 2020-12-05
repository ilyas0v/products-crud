<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;

class PageController extends Controller
{
    
    public function index()
    {
        $categories =  ProductCategory::where('status', 1)
                                      ->orderBy('ordering', 'ASC')
                                      ->get(); // SELECT * FROM product_categories WHERE status = 1 ORDER BY ordering ASC;


        $products = Product::all();
        
        return view('frontend.home', compact('categories', 'products'));
    }
}
