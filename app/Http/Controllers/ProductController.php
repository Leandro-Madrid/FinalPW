<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
     
        $productsQuery = Product::query();

        if ($request->has('category_id')) {
            $productsQuery->where('category_id', $request->input('category_id'));
        }

        $products = $productsQuery->paginate(1);

        return view('web.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('web.show', ['product' => $product]);
    }
}
