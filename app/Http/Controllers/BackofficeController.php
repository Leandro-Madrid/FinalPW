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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'image' => $imagePath,
        ]);

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
        'category_id' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('backoffice.index');
    }

    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->category_id = $request->input('category_id');

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images');
        $product->image = str_replace('public/', '', $imagePath);
    }

    $product->save();

    return redirect()->route('backoffice.edit', ['id' => $product->id])->with('success', 'Producto actualizado exitosamente');
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

