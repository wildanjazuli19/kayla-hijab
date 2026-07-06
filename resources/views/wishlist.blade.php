@extends('layouts.app')

@section('content')

<section class="bg-[#FAF9F6] min-h-screen">

    {{-- HERO --}}
    <section class="relative overflow-hidden py-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid lg:grid-cols-2 gap-20 items-center">

                {{-- LEFT --}}
                <div>

                    <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white shadow-sm border border-[#E5E7EB] text-[#0B5D4B] tracking-[2px] text-sm">
                        ❤️ YOUR FAVORITES
                    </span>

                    <h1 class="mt-8 text-6xl lg:text-7xl font-bold leading-tight text-[#1F2937]">
                        My Wishlist
                    </h1>

                    <p class="mt-8 text-xl leading-relaxed text-gray-500 max-w-2xl">
                        Keep all your favorite hijab collections in one place and shop them whenever you're ready.
                    </p>

                    <div class="mt-12 flex flex-wrap gap-5">

                        <a
                            href="/collection"
                            class="h-16 px-10 rounded-full bg-[#0B5D4B] hover:bg-[#D4AF37] text-white transition flex items-center justify-center"
                        >
                            Continue Shopping
                        </a>

                        <a
                            href="/new-arrival"
                            class="h-16 px-10 rounded-full border border-[#0B5D4B] hover:bg-[#0B5D4B] hover:text-white transition flex items-center justify-center"
                        >
                            Explore New Arrival
                        </a>

                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="relative">

                    <img
                        src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f"
                        class="rounded-[40px] shadow-2xl w-full h-[700px] object-cover"
                    >

                    <div class="absolute inset-0 rounded-[40px] ring-1 ring-white/20"></div>

                </div>

            </div>

        </div>

    </section>

    {{-- SUMMARY --}}
    <section class="max-w-7xl mx-auto px-6 pb-16">

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach([
                ['Saved Products', '24'],
                ['Ready Stock', '18'],
                ['Price Drop', '5'],
                ['New Arrival Saved', '8']
            ] as $item)

                <div class="bg-white rounded-[30px] p-8 shadow-sm border border-[#E5E7EB] hover:shadow-xl transition duration-500">

                    <div class="w-14 h-14 rounded-2xl bg-[#0B5D4B]/10 flex items-center justify-center text-2xl">
                        ✨
                    </div>

                    <h3 class="mt-8 text-4xl font-bold text-[#1F2937]">
                        {{ $item[1] }}
                    </h3>

                    <p class="mt-3 text-gray-500">
                        {{ $item[0] }}
                    </p>

                </div>

            @endforeach

        </div>

    </section>

    {{-- FILTER --}}
    <section class="max-w-7xl mx-auto px-6 pb-16">

        <div class="bg-white rounded-[30px] shadow-sm border border-[#E5E7EB] p-8">

            <div class="grid lg:grid-cols-6 gap-5">

                <input
                    type="text"
                    placeholder="Search Products"
                    class="h-14 rounded-2xl border border-[#E5E7EB] px-5 focus:outline-none focus:border-[#0B5D4B]"
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
                    <option>Availability</option>
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

                <div class="group bg-white rounded-[30px] overflow-hidden border border-[#E5E7EB] hover:border-[#D4AF37] hover:shadow-2xl transition duration-500">

                    {{-- IMAGE --}}
                    <div class="relative overflow-hidden">

                        <img
                             src="{{ $product->thumbnail
        ? asset('storage/' . $product->thumbnail)
        : 'https://via.placeholder.com/600x600?text=Kayla+Hijab'
    }}"
    alt="{{ $product->name }}"
    class="w-full h-[420px] object-cover group-hover:scale-105 transition duration-700"
                        >

                        {{-- BADGES --}}
                        <div class="absolute top-5 left-5 flex flex-col gap-3">

                            <span class="px-4 py-2 rounded-full bg-[#0B5D4B] text-white text-xs tracking-wide">
                                PREMIUM
                            </span>

                            <span class="px-4 py-2 rounded-full bg-[#D4AF37] text-white text-xs tracking-wide">
                                BEST SELLER
                            </span>

                        </div>

                        {{-- HEART --}}
                        <button
                            class="absolute top-5 right-5 w-12 h-12 rounded-full bg-white/90 backdrop-blur flex items-center justify-center shadow-lg hover:scale-110 transition"
                        >
                            ❤️
                        </button>

                    </div>

                    {{-- CONTENT --}}
                    <div class="p-7">

                        <p class="text-sm tracking-wide text-gray-400">
                            Premium Collection
                        </p>

                        <h3 class="mt-3 text-2xl font-semibold text-[#1F2937]">
                            {{ $product->name }}
                        </h3>

                        <div class="mt-4 text-[#D4AF37]">
                            ⭐⭐⭐⭐⭐
                        </div>

                        {{-- PRICE --}}
                        <div class="mt-5 flex items-center gap-4">

                            <span class="text-2xl font-bold text-[#0B5D4B]">
                                Rp {{ number_format($product->price) }}
                            </span>

                            <span class="line-through text-gray-400">
                                Rp 799.000
                            </span>

                        </div>

                        {{-- STOCK --}}
                        <div class="mt-5 flex items-center gap-2 text-sm text-green-600">

                            <span class="w-2 h-2 rounded-full bg-green-500"></span>

                            Ready Stock

                        </div>

                        {{-- ACTIONS --}}
                        <div class="mt-7 space-y-4">

                            <form
                                action="{{ route('cart.add', $product->id) }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    class="w-full h-14 rounded-full bg-[#0B5D4B] hover:bg-[#D4AF37] text-white transition"
                                >
                                    Add to Cart
                                </button>

                            </form>

                            <button
                                class="w-full h-14 rounded-full border border-red-200 hover:bg-red-50 text-red-500 transition"
                            >
                                Remove from Wishlist
                            </button>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

    {{-- RECOMMENDED --}}
    <section class="max-w-7xl mx-auto px-6 pb-24">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-5xl font-bold text-[#1F2937]">
                    You May Also Love
                </h2>

                <p class="mt-4 text-gray-500">
                    Discover more luxury hijab collections curated for you.
                </p>

            </div>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mt-16">

            @foreach($products->take(4) as $product)

                <div class="bg-white rounded-[30px] overflow-hidden shadow-sm hover:shadow-2xl transition duration-500">

                    <img
                        src="{{ $product->thumbnail
        ? asset('storage/' . $product->thumbnail)
        : 'https://via.placeholder.com/600x600?text=Kayla+Hijab'
    }}"
    alt="{{ $product->name }}"
    class="w-full h-[420px] object-cover group-hover:scale-105 transition duration-700"
                    >

                    <div class="p-6">

                        <h3 class="text-xl font-semibold">
                            {{ $product->name }}
                        </h3>

                        <div class="mt-3 text-[#D4AF37]">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <div class="mt-5 flex items-center justify-between">

                            <span class="text-xl font-bold text-[#0B5D4B]">
                                Rp {{ number_format($product->price) }}
                            </span>

                            <button
                                class="w-11 h-11 rounded-full bg-[#0B5D4B] text-white hover:bg-[#D4AF37] transition"
                            >
                                +
                            </button>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

    {{-- NEWSLETTER --}}
    <section class="bg-white py-24 border-t border-[#E5E7EB]">

        <div class="max-w-4xl mx-auto px-6 text-center">

            <h2 class="text-5xl font-bold text-[#1F2937]">
                Stay Inspired with Kayla Hijab
            </h2>

            <p class="mt-6 text-xl text-gray-500">
                Subscribe to receive exclusive collections and luxury fashion updates.
            </p>

            <div class="mt-10 flex flex-col md:flex-row gap-5">

                <input
                    type="email"
                    placeholder="Enter your email"
                    class="flex-1 h-16 rounded-full border border-[#E5E7EB] px-8"
                >

                <button
                    class="h-16 px-10 rounded-full bg-[#0B5D4B] hover:bg-[#D4AF37] text-white transition"
                >
                    Subscribe
                </button>

            </div>

        </div>

    </section>

</section>

@endsection