<?php

namespace App\Http\Controllers;

use App\Models\Product;     
use App\Models\Category;     
use Illuminate\Http\Request;  

class ProductController extends Controller
{
    
    public function index(Request $request)
    {
        $categories = Category::all(); // Trae categorías.
        $selectedCategory = null;      // Variable para almacenar la categoría seleccionada.

        // Ve si esta 'category_id' en el pedido.
        if ($request->has('category_id')) {
            $selectedCategory = $request->input('category_id'); // Toma la categoría seleccionada.
        }

        $productsQuery = Product::query();  // Hace la consulta.

        // Ve si se seleccionó categoría y filtra.
        if ($selectedCategory) {
            $productsQuery->where('category_id', $selectedCategory);
        }

        $products = $productsQuery->paginate(8); // Paginación de los productos (8 pp).

        // Indexcon productos, categorías y la categoría seleccionada.
        return view('web.index', compact('products', 'categories', 'selectedCategory'));
    }

    // Producto específico.
    public function show($id)
    {
        $product = Product::find($id); 
        
        
        return view('web.show', ['product' => $product]);
    }
}


