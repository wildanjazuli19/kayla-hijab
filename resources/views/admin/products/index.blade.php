@extends('admin.layouts.app')

@section('content')

<div class="max-w-[1600px] mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">

        <div>

            <p class="text-sm tracking-[5px] uppercase text-[#D4AF37] font-medium">
                Kayla Hijab Admin
            </p>

            <h1 class="text-5xl font-bold text-[#1F2937] mt-4">
                Products
            </h1>

            <p class="text-gray-500 mt-3 text-lg">
                Manage luxury fashion products
            </p>

        </div>

        <a
            href="{{ route('admin.products.create') }}"
            class="h-14 px-8 rounded-2xl bg-[#0B5D4B] hover:bg-[#083C31] text-white flex items-center justify-center transition shadow-lg"
        >
            + Add Product
        </a>

    </div>

    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="mb-8 bg-green-50 border border-green-200 text-green-700 rounded-3xl p-6">

            {{ session('success') }}

        </div>

    @endif

    {{-- STATS --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

        <div class="bg-white rounded-[30px] border border-[#ECECEC] p-8 shadow-sm">

            <p class="text-gray-500">
                Total Products
            </p>

            <h2 class="text-5xl font-bold mt-4 text-[#1F2937]">

                {{ $products->count() }}

            </h2>

        </div>

        <div class="bg-white rounded-[30px] border border-[#ECECEC] p-8 shadow-sm">

            <p class="text-gray-500">
                Active Products
            </p>

            <h2 class="text-5xl font-bold mt-4 text-[#22C55E]">

                {{ $products->where('status', 1)->count() }}

            </h2>

        </div>

        <div class="bg-white rounded-[30px] border border-[#ECECEC] p-8 shadow-sm">

            <p class="text-gray-500">
                Low Stock
            </p>

            <h2 class="text-5xl font-bold mt-4 text-[#F59E0B]">

                {{ $products->where('stock', '<', 10)->count() }}

            </h2>

        </div>

        <div class="bg-white rounded-[30px] border border-[#ECECEC] p-8 shadow-sm">

            <p class="text-gray-500">
                Out of Stock
            </p>

            <h2 class="text-5xl font-bold mt-4 text-[#EF4444]">

                {{ $products->where('stock', 0)->count() }}

            </h2>

        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-[30px] border border-[#ECECEC] shadow-sm overflow-hidden">

        {{-- TOP BAR --}}
        <div class="p-8 border-b border-[#ECECEC] flex flex-col lg:flex-row gap-5 lg:items-center lg:justify-between">

            <div class="relative w-full lg:w-[400px]">

                <input
                    type="text"
                    placeholder="Search product..."
                    class="w-full h-14 rounded-2xl border border-[#ECECEC] bg-[#FAF9F6] px-6 focus:outline-none focus:border-[#0B5D4B]"
                >

            </div>

            <div class="flex items-center gap-4">

                <button
                    class="h-14 px-6 rounded-2xl border border-[#ECECEC] bg-white hover:shadow-md transition"
                >
                    Export
                </button>

                <button
                    class="h-14 px-6 rounded-2xl border border-[#ECECEC] bg-white hover:shadow-md transition"
                >
                    Filter
                </button>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-[#FAF9F6]">

                    <tr>

                        <th class="text-left p-6 text-sm font-semibold text-gray-500">
                            Product
                        </th>

                        <th class="text-left p-6 text-sm font-semibold text-gray-500">
                            SKU
                        </th>

                        <th class="text-left p-6 text-sm font-semibold text-gray-500">
                            Price
                        </th>

                        <th class="text-left p-6 text-sm font-semibold text-gray-500">
                            Stock
                        </th>

                        <th class="text-left p-6 text-sm font-semibold text-gray-500">
                            Status
                        </th>

                        <th class="text-left p-6 text-sm font-semibold text-gray-500">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)

                        <tr class="border-t border-[#ECECEC] hover:bg-[#FAF9F6] transition">

                            {{-- PRODUCT --}}
                            <td class="p-6">

                                <div class="flex items-center gap-5">

                                    @if($product->thumbnail)

                                        <img
                                            src="{{ asset('storage/'.$product->thumbnail) }}"
                                            class="w-20 h-20 rounded-2xl object-cover border border-[#ECECEC]"
                                        >

                                    @else

                                        <div
                                            class="w-20 h-20 rounded-2xl bg-[#FAF9F6] border border-[#ECECEC] flex items-center justify-center text-3xl"
                                        >
                                            👜
                                        </div>

                                    @endif

                                    <div>

                                        <h3 class="font-bold text-lg text-[#1F2937]">

                                            {{ $product->name }}

                                        </h3>

                                        <p class="text-gray-500 mt-1 text-sm">

                                            {{ Str::limit($product->description, 40) }}

                                        </p>

                                    </div>

                                </div>

                            </td>

                            {{-- SKU --}}
                            <td class="p-6 text-gray-500">

                                {{ $product->sku }}

                            </td>

                            {{-- PRICE --}}
                            <td class="p-6">

                                <div>

                                    <h3 class="font-bold text-[#1F2937]">

                                        Rp {{ number_format($product->price) }}

                                    </h3>

                                    @if($product->discount_price)

                                        <p class="text-sm text-red-500 mt-1">

                                            Rp {{ number_format($product->discount_price) }}

                                        </p>

                                    @endif

                                </div>

                            </td>

                            {{-- STOCK --}}
                            <td class="p-6">

                                @if($product->stock > 10)

                                    <span
                                        class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-medium"
                                    >
                                        {{ $product->stock }} In Stock
                                    </span>

                                @elseif($product->stock > 0)

                                    <span
                                        class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm font-medium"
                                    >
                                        Low Stock
                                    </span>

                                @else

                                    <span
                                        class="px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-medium"
                                    >
                                        Out Of Stock
                                    </span>

                                @endif

                            </td>

                            {{-- STATUS --}}
                            <td class="p-6">

                                @if($product->status)

                                    <span
                                        class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-medium"
                                    >
                                        Active
                                    </span>

                                @else

                                    <span
                                        class="px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-medium"
                                    >
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            {{-- ACTION --}}
                            <td class="p-6">

                                <div class="flex items-center gap-3">

                                    <a
                                        href="{{ route('admin.products.edit', $product->id) }}"
                                        class="h-11 px-5 rounded-xl bg-[#0B5D4B] hover:bg-[#083C31] text-white flex items-center transition"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.products.destroy', $product->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Delete this product?')"
                                            class="h-11 px-5 rounded-xl bg-red-500 hover:bg-red-600 text-white transition"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="p-20 text-center">

                                <div class="text-7xl mb-6">
                                    🛍️
                                </div>

                                <h3 class="text-3xl font-bold text-[#1F2937]">
                                    No Products Yet
                                </h3>

                                <p class="text-gray-500 mt-3">
                                    Start adding your premium fashion collection
                                </p>

                                <a
                                    href="{{ route('admin.products.create') }}"
                                    class="inline-flex mt-8 h-14 px-8 rounded-2xl bg-[#0B5D4B] text-white items-center"
                                >
                                    + Add Product
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection