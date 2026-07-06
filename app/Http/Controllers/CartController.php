<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CART PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADD TO CART
    |--------------------------------------------------------------------------
    */

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        /*
        |--------------------------------------------------------------------------
        | IF PRODUCT ALREADY EXISTS
        |--------------------------------------------------------------------------
        */

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            /*
            |--------------------------------------------------------------------------
            | ADD NEW PRODUCT
            |--------------------------------------------------------------------------
            */

            $cart[$id] = [

                "name" => $product->name,

                "price" => $product->price,

                "thumbnail" => $product->thumbnail,

                "quantity" => 1,

            ];
        }

        /*
        |--------------------------------------------------------------------------
        | SAVE SESSION
        |--------------------------------------------------------------------------
        */

        session()->put('cart', $cart);

        return redirect()
            ->back()
            ->with('success', 'Product added to cart!');
    }

    /*
    |--------------------------------------------------------------------------
    | REMOVE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);
        }

        return redirect()
            ->back()
            ->with('success', 'Product removed from cart!');
    }

    /*
    |--------------------------------------------------------------------------
    | CLEAR CART
    |--------------------------------------------------------------------------
    */

    public function clear()
    {
        session()->forget('cart');

        return redirect()
            ->back()
            ->with('success', 'Cart cleared successfully!');
    }
}