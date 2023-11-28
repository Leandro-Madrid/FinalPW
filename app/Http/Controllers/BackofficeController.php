<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backoffice.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backoffice.create', compact('categories'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'nullable',
            'image' => 'nullable',
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id', null);
        $product->image = $request->input('image') ?: 'https://picsum.photos/50';

        $product->save();

        return redirect()->route('backoffice.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all(); 
        return view('backoffice.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'nullable',
            'image' => 'nullable',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('backoffice.index');
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->image = $request->input('image');
        $product->save();

        return redirect()->route('backoffice.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('backoffice.index');
        }

        $product->delete();

        return redirect()->route('backoffice.index');
    }
}

