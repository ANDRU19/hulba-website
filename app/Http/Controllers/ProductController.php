<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    
    public function index()
    { 
        $products = Product::with(['customer','category','image'])->latest()->paginate(10);
        return Inertia::render('Product/Index', ['products' => $products]);
    }


    public function create()
    {
        $categories = Category::all(['id','name']);
        return Inertia::render('Product/Create',['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $valid_product = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'category_id' => 'required|int',
        ]);

        $product = Product::create($valid_product);

        if ($request->hasFile('image')) {
            $product->imageSave($request->file('image'));
        }

        return  Redirect::route('product.index');
    }


    public function edit(Product $product)
    {
        return Inertia::render('Product/Edit', [
            'product' => [
                'id' => $product->id,
                'title' => $product->title,
                'category_id' => $product->category_id,
                'description' => $product->description,
                'image' => $product->image->name,
            ],
            'categories' => Category::all(['id','name'])
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
                'name' => ['required', 'max:90']
            ]);
            $product->update($data);

        return Redirect::route('product.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        
        return Redirect::route('product.index');
    }
}
