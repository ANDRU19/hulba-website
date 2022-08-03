<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return Inertia::render('Category/Index', ['categories' => $categories]);
    }


    public function create()
    {
        return Inertia::render('Category/Create');
    }


    public function store(Request $request)
    {
        Category::create(
            $request->validate([
                'name' => ['required', 'max:90']
            ])
        );

        return Redirect::route('category.index');
    }


    public function edit(Category $category)
    {
        return Inertia::render('Category/Edit', [
            'category' => [
                'id' => $category->id,
                'name' => $category->name
            ]
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
                'name' => ['required', 'max:90']
            ]);
            $category->update($data);

        return Redirect::route('category.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        
        return Redirect::route('category.index');
    }
}
