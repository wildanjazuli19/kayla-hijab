<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'category_id' => 'required',

            'thumbnail' => 'required|image',

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD IMAGE
        |--------------------------------------------------------------------------
        */

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail')
                ->store('products', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE PRODUCT
        |--------------------------------------------------------------------------
        */

        $product = Product::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'category_id' => $request->category_id,

            'description' => $request->description,

            /*
            |--------------------------------------------------------------------------
            | DEFAULT PRICE
            |--------------------------------------------------------------------------
            | ambil dari variant pertama
            */

            'price' => $request->variant_prices[0] ?? 0,

            'discount_price' => $request->discount_price ?? null,

            /*
            |--------------------------------------------------------------------------
            | TOTAL STOCK
            |--------------------------------------------------------------------------
            */

            'stock' => array_sum(
                $request->variant_stocks ?? []
            ),

            /*
            |--------------------------------------------------------------------------
            | SKU AUTO GENERATE
            |--------------------------------------------------------------------------
            */

            'sku' =>
                'KH-' .
                strtoupper(substr(Str::slug($request->name), 0, 3))
                . '-' .
                rand(1000,9999),

            'thumbnail' => $thumbnail,

            'status' => 1,

        ]);

        /*
        |--------------------------------------------------------------------------
        | SAVE VARIANTS
        |--------------------------------------------------------------------------
        */

        if ($request->sizes) {

            foreach ($request->sizes as $index => $size) {

                /*
                |--------------------------------------------------------------------------
                | SKIP EMPTY PRICE
                |--------------------------------------------------------------------------
                */

                if (
                    !empty($request->variant_prices[$index])
                ) {

                    ProductVariant::create([

                        'product_id' => $product->id,

                        'size' => $size,

                        'price' =>
                            $request->variant_prices[$index],

                        'stock' =>
                            $request->variant_stocks[$index] ?? 0,

                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.products')
            ->with(
                'success',
                'Product created successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::all();

        return view(
            'admin.products.edit',
            compact('product', 'categories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([

            'name' => 'required',

            'category_id' => 'required',

        ]);

        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        $thumbnail = $product->thumbnail;

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail')
                ->store('products', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PRODUCT
        |--------------------------------------------------------------------------
        */

        $product->update([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'category_id' => $request->category_id,

            'description' => $request->description,

            'price' => $request->variant_prices[0] ?? 0,

            'discount_price' => $request->discount_price ?? null,

            'stock' => array_sum(
                $request->variant_stocks ?? []
            ),

            'thumbnail' => $thumbnail,

        ]);

        /*
        |--------------------------------------------------------------------------
        | DELETE OLD VARIANTS
        |--------------------------------------------------------------------------
        */

        $product->variants()->delete();

        /*
        |--------------------------------------------------------------------------
        | SAVE NEW VARIANTS
        |--------------------------------------------------------------------------
        */

        if ($request->sizes) {

            foreach ($request->sizes as $index => $size) {

                if (
                    !empty($request->variant_prices[$index])
                ) {

                    ProductVariant::create([

                        'product_id' => $product->id,

                        'size' => $size,

                        'price' =>
                            $request->variant_prices[$index],

                        'stock' =>
                            $request->variant_stocks[$index] ?? 0,

                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.products')
            ->with(
                'success',
                'Product updated successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | DELETE VARIANTS
        |--------------------------------------------------------------------------
        */

        $product->variants()->delete();

        /*
        |--------------------------------------------------------------------------
        | DELETE PRODUCT
        |--------------------------------------------------------------------------
        */

        $product->delete();

        return redirect()
            ->route('admin.products')
            ->with(
                'success',
                'Product deleted successfully'
            );
    }
}

