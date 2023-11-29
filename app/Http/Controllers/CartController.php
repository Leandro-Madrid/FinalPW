<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');

        $cart = $request->session()->get('cart', []);

        $cart[] = $productId;

        $request->session()->put('cart', $cart);

        $cartProducts = Product::whereIn('id', $cart)->get();

        $totalPrice = $cartProducts->sum('price');

        return view('cart.viewCart', ['cartProducts' => $cartProducts, 'totalPrice' => $totalPrice]);
    }

    public function viewCart(Request $request)
    {

        $cart = $request->session()->get('cart', []);

        $cartProducts = Product::whereIn('id', $cart)->get();
        
        $totalPrice = $cartProducts->sum('price');

        return view('cart.viewCart', ['cartProducts' => $cartProducts, 'totalPrice' => $totalPrice]);
    }

    public function remove(Request $request, $id)
    {

        $cart = $request->session()->get('cart', []);

        $index = array_search($id, $cart);
        if ($index !== false) {
            unset($cart[$index]);
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.view');
    }

    public function buy(Request $request)
    {
        
        $cart = $request->session()->get('cart', []);
       
        $cartProducts = Product::whereIn('id', $cart)->get();

        $totalPrice = $cartProducts->sum('price');

        return view('cart.buy', ['cartProducts' => $cartProducts, 'totalPrice' => $totalPrice]);
        
    }
}
