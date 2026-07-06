@extends('admin.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-4xl font-bold mb-10">
        Edit Product
    </h1>

    <form
        action="{{ route('admin.products.update', $product->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-8"
    >

        @csrf
        @method('PUT')

        <div class="bg-white rounded-3xl p-10 border border-[#ECECEC]">

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label class="block mb-3 font-semibold">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ $product->name }}"
                        class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                    >

                </div>

                <div>

                    <label class="block mb-3 font-semibold">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                    >

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected($product->category_id == $category->id)
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-3 font-semibold">
                        Price
                    </label>

                    <input
                        type="number"
                        name="price"
                        value="{{ $product->price }}"
                        class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                    >

                </div>

                <div>

                    <label class="block mb-3 font-semibold">
                        Discount Price
                    </label>

                    <input
                        type="number"
                        name="discount_price"
                        value="{{ $product->discount_price }}"
                        class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                    >

                </div>

                <div>

                    <label class="block mb-3 font-semibold">
                        Stock
                    </label>

                    <input
                        type="number"
                        name="stock"
                        value="{{ $product->stock }}"
                        class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                    >

                </div>

                <div>

                    <label class="block mb-3 font-semibold">
                        Thumbnail
                    </label>

                    <input
                        type="file"
                        name="thumbnail"
                        class="w-full"
                    >

                </div>

            </div>

            <div class="mt-6">

                <label class="block mb-3 font-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full rounded-2xl border border-[#E5E7EB] p-5"
                >{{ $product->description }}</textarea>

            </div>

        </div>

        <div class="flex items-center gap-4">

            <button
                class="h-14 px-8 rounded-2xl bg-[#0B5D4B] text-white"
            >
                Update Product
            </button>

            <a
                href="{{ route('admin.products') }}"
                class="h-14 px-8 rounded-2xl border border-[#E5E7EB] flex items-center"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection