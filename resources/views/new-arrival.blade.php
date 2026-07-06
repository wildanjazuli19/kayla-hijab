@extends('layouts.app')

@section('content')

<section class="bg-[#FAF9F6]">

    {{-- HERO --}}
    <section class="relative h-[90vh] overflow-hidden">

        <img
            src="https://images.unsplash.com/photo-1496747611176-843222e1e57c"
            class="absolute inset-0 w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 h-full flex items-center">

            <div class="max-w-7xl mx-auto px-6 w-full">

                <span class="px-5 py-2 rounded-full bg-white/20 backdrop-blur text-white text-sm tracking-[3px]">
                    NEW COLLECTION 2026
                </span>

                <h1 class="mt-8 text-6xl lg:text-7xl text-white font-bold leading-tight max-w-3xl">
                    Discover Our New Arrival
                </h1>

                <p class="mt-8 text-xl text-gray-200 max-w-2xl leading-relaxed">
                    Explore the newest premium hijab collections crafted for modern Muslim women.
                </p>

                <button
                    class="mt-10 h-16 px-10 rounded-full bg-[#0B5D4B] hover:bg-[#D4AF37] transition text-white text-lg"
                >
                    Shop Now
                </button>

            </div>

        </div>

    </section>

    {{-- FILTER --}}
    <section class="max-w-7xl mx-auto px-6 py-14">

        <div class="bg-white rounded-[30px] shadow-sm border border-[#E5E7EB] p-8">

            <div class="grid lg:grid-cols-6 gap-5">

                <input
                    type="text"
                    placeholder="Search Product"
                    class="h-14 rounded-2xl border border-[#E5E7EB] px-5 focus:outline-none"
                >

                <select class="h-14 rounded-2xl border border-[#E5E7EB] px-5">
                    <option>Category</option>
                </select>

                <select class="h-14 rounded-2xl border border-[#E5E7EB] px-5">
                    <option>Color</option>
                </select>

                <select class="h-14 rounded-2xl border border-[#E5E7EB] px-5">
                    <option>Material</option>
                </select>

                <select class="h-14 rounded-2xl border border-[#E5E7EB] px-5">
                    <option>Size</option>
                </select>

                <select class="h-14 rounded-2xl border border-[#E5E7EB] px-5">
                    <option>Sort By</option>
                </select>

            </div>

        </div>

    </section>

    {{-- PRODUCTS --}}
    <section class="max-w-7xl mx-auto px-6 pb-24">

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($products as $product)

                <div class="group bg-white rounded-[30px] overflow-hidden shadow-sm hover:shadow-2xl transition duration-500">

                    <div class="relative overflow-hidden">

                        <img
                             src="{{ $product->thumbnail
        ? asset('storage/' . $product->thumbnail)
        : 'https://via.placeholder.com/600x600?text=Kayla+Hijab'
    }}"
    alt="{{ $product->name }}"
    class="w-full h-[420px] object-cover group-hover:scale-105 transition duration-700"
                        >

                        <div class="absolute top-5 left-5 flex flex-col gap-3">

                            <span class="px-4 py-2 rounded-full bg-[#0B5D4B] text-white text-xs">
                                NEW
                            </span>

                            <span class="px-4 py-2 rounded-full bg-red-500 text-white text-xs">
                                -20%
                            </span>

                        </div>

                    </div>

                    <div class="p-7">

                        <p class="text-sm text-gray-400">
                            Premium Collection
                        </p>

                        <h3 class="mt-3 text-2xl font-semibold text-[#1F2937]">
                            {{ $product->name }}
                        </h3>

                        <div class="mt-4 text-[#D4AF37]">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <div class="mt-5 flex items-center justify-between">

                            <span class="text-2xl font-bold text-[#0B5D4B]">
                                Rp {{ number_format($product->price) }}
                            </span>

                            <form
                                action="{{ route('cart.add', $product->id) }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    class="w-12 h-12 rounded-full bg-[#0B5D4B] text-white hover:bg-[#D4AF37] transition"
                                >
                                    +
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

@endsection