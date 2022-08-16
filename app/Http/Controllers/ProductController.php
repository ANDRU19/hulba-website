<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    
    public function index()
    { 
        $products = Product::with(['customer','image'])->get();
        
        return view('frontend.products', ['products' => $products]);
    }

    
    public function show(Product $product)
    {
        return view('frontend.product', ['product' => $product]);
    }

}
