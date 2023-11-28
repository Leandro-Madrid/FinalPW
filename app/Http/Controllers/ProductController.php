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
        $selectedCategory = $request->session()->get('selectedCategory');

        if ($request->has('category_id')) {
            $selectedCategory = $request->input('category_id');
            $request->session()->put('selectedCategory', $selectedCategory);
        }

        $productsQuery = Product::query();

        if ($selectedCategory) {
            $productsQuery->where('category_id', $selectedCategory);
        }

        $products = $productsQuery->paginate(6);

        return view('web.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('web.show', ['product' => $product]);
    }
}
