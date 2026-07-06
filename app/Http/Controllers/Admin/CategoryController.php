<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $categories = Category::latest()->get();

        return view(
            'admin.categories.index',
            compact('categories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.categories.create');
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

            'image' => 'nullable|image',

        ]);

        $image = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('categories', 'public');
        }

        Category::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'description' => $request->description,

            'image' => $image,

            'status' => $request->status ? 1 : 0,

            'featured' => $request->featured ? 1 : 0,

        ]);

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category created successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view(
            'admin.categories.edit',
            compact('category')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $image = $category->image;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('categories', 'public');
        }

        $category->update([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'description' => $request->description,

            'image' => $image,

            'status' => $request->status ? 1 : 0,

            'featured' => $request->featured ? 1 : 0,

        ]);

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category updated successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category deleted successfully');
    }
}