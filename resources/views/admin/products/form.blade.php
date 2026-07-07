@extends('admin.layouts.app')

@section('content')

<div class="max-w-[1700px] mx-auto pb-40">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-10">

        <div>

            <p class="uppercase tracking-[5px] text-[#D4AF37] text-sm font-semibold">
                Kayla Hijab Admin
            </p>

            <h1 class="text-5xl font-bold text-[#1F2937] mt-4">
                {{ $product->exists ? 'Edit Product' : 'Create Product' }}
            </h1>

            <p class="text-gray-500 mt-3 text-lg">
                {{ $product->exists ? 'Edit' : 'Add' }} luxury fashion product
            </p>

        </div>

        <a
            href="{{ route('admin.products') }}"
            class="h-14 px-8 rounded-2xl border border-[#E5E7EB] bg-white flex items-center hover:shadow-lg transition">
            Back
        </a>

    </div>

    {{-- ERROR --}}
    @if ($errors->any())

    <div class="mb-8 bg-red-50 border border-red-200 rounded-[30px] p-6">

        <ul class="space-y-2 text-red-600">

            @foreach ($errors->all() as $error)

            <li>• {{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    {{-- FORM --}}
    <form
        action="{{ $product->exists ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @if($product->exists)
        @method('PUT')
        @endif


        <div class="grid grid-cols-1 2xl:grid-cols-12 gap-8">

            {{-- LEFT --}}
            <div class="2xl:col-span-8 space-y-8">

                {{-- GENERAL --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] p-10 shadow-sm">

                    <div class="mb-10">

                        <h2 class="text-3xl font-bold text-[#1F2937]">
                            General Information
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Basic product details
                        </p>

                    </div>

                    <div class="space-y-7">

                        <div>

                            <label class="block mb-3 font-semibold">
                                Product Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ $product->name ?? old('name') }}"
                                placeholder="Luxury Emerald Gamis"
                                class="w-full h-16 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-6 focus:outline-none focus:border-[#0B5D4B]">

                        </div>

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>

                                <label class="block mb-3 font-semibold">
                                    Category
                                </label>

                                <select
                                    name="category_id"
                                    class="w-full h-16 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-6">

                                    <option value="">
                                        Select Category
                                    </option>

                                    @foreach($categories as $category)

                                    <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>

                                        {{ $category->name }}

                                    </option>

                                    @endforeach

                                </select>

                            </div>

                            <div>

                                <label class="block mb-3 font-semibold">
                                    Barcode
                                </label>

                                <input
                                    type="text"
                                    name="barcode"
                                    placeholder="899999999"
                                    value="{{ $product->barcode ?? old('barcode') }}"
                                    class="w-full h-16 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-6">

                            </div>

                        </div>

                        <div>

                            <label class="block mb-3 font-semibold">
                                Description
                            </label>

                            <textarea
                                name="description"
                                rows="8"
                                placeholder="Write product description..."
                                class="w-full rounded-[30px] border border-[#E5E7EB] bg-[#FAF9F6] p-6 resize-none">{{ $product->description ?? old('description') }}</textarea>

                        </div>

                    </div>

                </div>

                {{-- PRICING --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] p-10 shadow-sm">

                    <div class="mb-10">

                        <h2 class="text-3xl font-bold">
                            Pricing
                        </h2>

                    </div>

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>

                            <label class="block mb-3 font-semibold">
                                Regular Price
                            </label>

                            <input
                                type="number"
                                name="price"
                                placeholder="299000"
                                value="{{ $product->price ?? old('price') }}"
                                class="w-full h-16 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-6">

                        </div>

                        <div>

                            <label class="block mb-3 font-semibold">
                                Discount Price
                            </label>

                            <input
                                type="number"
                                name="discount_price"
                                placeholder="249000"
                                value="{{ $product->discount_price ?? old('discount_price') }}"
                                class="w-full h-16 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-6">

                        </div>

                    </div>

                </div>

                {{-- PRODUCT VARIANTS --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] p-10 shadow-sm">

                    <div class="mb-10">

                        <h2 class="text-3xl font-bold">
                            Product Variants
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Use for Gamis / Clothing size variations
                        </p>

                    </div>

                    @php
                    $sizes = ['S', 'M', 'L', 'XL'];
                    @endphp

                    <div class="space-y-5">

                        @foreach($sizes as $size)

                        @php
                        $variant = isset($product)
                        ? $product->variants->firstWhere('size', $size)
                        : null;
                        @endphp

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                            {{-- Size --}}
                            <input
                                type="text"
                                name="sizes[]"
                                value="{{ $size }}"
                                readonly
                                class="h-16 rounded-2xl border border-[#E5E7EB] bg-gray-100 px-6">

                            {{-- Price --}}
                            <input
                                type="number"
                                name="variant_prices[]"
                                value="{{ old('variant_prices.' . $loop->index, $variant->price ?? '') }}"
                                placeholder="Price for {{ $size }}"
                                class="h-16 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-6">

                            {{-- Stock --}}
                            <input
                                type="number"
                                name="variant_stocks[]"
                                value="{{ old('variant_stocks.' . $loop->index, $variant->stock ?? '') }}"
                                placeholder="Stock for {{ $size }}"
                                class="h-16 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-6">

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="2xl:col-span-4 space-y-8">

                {{-- IMAGE --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] p-10 shadow-sm">

                    <div class="mb-8">

                        <h2 class="text-3xl font-bold">
                            Product Image
                        </h2>

                    </div>

                    <div class="border-2 border-dashed border-[#D4AF37] rounded-[30px] bg-[#FAF9F6] p-10 text-center">

                        <div class="text-6xl mb-5">
                            📸
                        </div>

                        <h3 class="text-xl font-semibold">
                            Upload Thumbnail
                        </h3>

                        <p class="mt-2 text-gray-500">
                            PNG or JPG max 5MB
                        </p>

                        <input
                            type="file"
                            name="thumbnail"
                            class="mt-8 block w-full text-sm">

                    </div>

                </div>

                {{-- INVENTORY --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] p-10 shadow-sm">

                    <div class="mb-8">

                        <h2 class="text-3xl font-bold">
                            Inventory
                        </h2>

                    </div>

                    <div class="space-y-6">

                        <div>

                            <label class="block mb-3 font-semibold">
                                Main Stock
                            </label>

                            <input
                                type="number"
                                name="stock"
                                placeholder="100"
                                value="{{ $product->stock ?? old('stock') }}"
                                class="w-full h-16 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-6">

                        </div>

                        <div>

                            <label class="block mb-3 font-semibold">
                                Weight
                            </label>

                            <input
                                type="text"
                                name="weight"
                                placeholder="250g"
                                value="{{ $product->weight ?? old('weight') }}"
                                class="w-full h-16 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-6">

                        </div>

                    </div>

                </div>

                {{-- STATUS --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] p-10 shadow-sm">

                    <div class="mb-8">

                        <h2 class="text-3xl font-bold">
                            Product Status
                        </h2>

                    </div>

                    <div class="space-y-5">

                        <label class="flex items-center justify-between">

                            <span class="font-medium">
                                Featured Product
                            </span>

                            <input
                                type="checkbox"
                                name="featured"
                                value="1"
                                class="w-5 h-5">

                        </label>

                        <label class="flex items-center justify-between">

                            <span class="font-medium">
                                Best Seller
                            </span>

                            <input
                                type="checkbox"
                                name="best_seller"
                                value="1"
                                class="w-5 h-5">

                        </label>

                        <label class="flex items-center justify-between">

                            <span class="font-medium">
                                New Arrival
                            </span>

                            <input
                                type="checkbox"
                                name="new_arrival"
                                value="1"
                                class="w-5 h-5">

                        </label>

                    </div>

                </div>

            </div>

        </div>

        {{-- STICKY ACTION --}}
        <div class="fixed bottom-0 left-[280px] right-0 bg-white border-t border-[#ECECEC] px-10 py-5 flex items-center justify-end gap-5 z-50">

            <a
                href="{{ route('admin.products') }}"
                class="h-14 px-8 rounded-2xl border border-[#E5E7EB] bg-white flex items-center hover:shadow-md transition">
                Cancel
            </a>

            <button
                type="submit"
                class="h-14 px-10 rounded-2xl bg-[#0B5D4B] text-white hover:bg-[#083C31] transition shadow-lg">
                Save Product
            </button>

        </div>

    </form>

</div>

@endsection