<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Inertia\Inertia;


class ProductController extends Controller
{
    
    public function index()
    { 
        $products = Product::with(['customer','image'])
                        ->where('customer_id', auth()->user()->id)
                        ->latest()
                        ->paginate(10);
        return Inertia::render('Products/Index', ['products' => $products]);
    }


    public function create()
    {
        $categories = Product::categories();
        return Inertia::render('Products/Create',['categories' => $categories]);
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

        $product->payment()->create([
            'plan' => $request->payment['plan'],
            'price' => $request->payment['price'],
            'monthly' => $request->payment['monthly'],
            'days' => $request->payment['days']
        ]);

        return  Redirect::route('products.list');
    }


    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => [
                'id' => $product->id,
                'title' => $product->title,
                'category_id' => $product->category_id,
                'description' => $product->description,
                'image' => $product->image->name,
            ],
            'categories' => Product::categories(),
            'payment' => $product->payment
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required',
            //'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'category_id' => 'required|int',
            'benefits' => 'nullable|array'
            ]);
            
            $product->update($data); 

            if ($request->hasFile('image')) {
                $product->imageSave($request->file('image'));
            }

            $product->payment()->update([
                'plan' => $request->payment['plan'],
                'price' => $request->payment['price'],
                'monthly' => $request->payment['monthly'],
                'days' => $request->payment['days']
            ]); 

        return Redirect::route('products.list');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        
        return Redirect::route('products.list');
    }
}
