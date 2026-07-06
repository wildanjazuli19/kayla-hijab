
@extends('layouts.app')

@section('content')

{{-- ========================================================= --}}
{{-- HERO SECTION --}}
{{-- ========================================================= --}}

<section class="pt-10 lg:pt-16">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div
            class="grid lg:grid-cols-2 gap-14 items-center bg-white rounded-[40px] overflow-hidden border border-[#ECECEC] shadow-sm"
        >

            {{-- LEFT --}}
            <div class="p-8 lg:p-16">

                <span
                    class="inline-flex items-center px-5 py-2 rounded-full bg-[#0B5D4B]/10 text-[#0B5D4B] text-sm font-semibold tracking-wide"
                >
                    NEW COLLECTION 2026
                </span>

                <h1
                    class="mt-8 text-5xl lg:text-7xl leading-tight font-bold font-['Playfair_Display'] text-[#1F2937]"
                >

                    Elegant Hijab
                    <span class="text-[#0B5D4B]">
                        For Modern
                    </span>
                    Women

                </h1>

                <p
                    class="mt-8 text-lg text-gray-600 leading-[2]"
                >

                    Discover premium hijab collections designed
                    for elegance, comfort, and confidence.

                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a
                        href="{{ route('shop') }}"
                        class="h-14 px-8 rounded-2xl bg-[#0B5D4B] text-white flex items-center justify-center font-medium shadow-lg hover:bg-[#084C3D] transition-all duration-300"
                    >
                        Shop Now
                    </a>

                    <a
                        href="{{ route('shop') }}"
                        class="h-14 px-8 rounded-2xl border border-[#E5E7EB] bg-white hover:border-[#0B5D4B] flex items-center justify-center font-medium transition-all duration-300"
                    >
                        Explore Collection
                    </a>

                </div>

                {{-- STATS --}}
                <div
                    class="grid grid-cols-3 gap-6 mt-16"
                >

                    <div>

                        <h3 class="text-3xl font-bold text-[#0B5D4B]">
                            15K+
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Customers
                        </p>

                    </div>

                    <div>

                        <h3 class="text-3xl font-bold text-[#0B5D4B]">
                            500+
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Products
                        </p>

                    </div>

                    <div>

                        <h3 class="text-3xl font-bold text-[#0B5D4B]">
                            98%
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Satisfaction
                        </p>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="relative h-full">

                <img
                    src="https://plus.unsplash.com/premium_photo-1680012589533-9ba597be37b1?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGhpamFifGVufDB8fDB8fHww=80&w=1200"
                    class="w-full h-full object-cover lg:min-h-[760px]"
                >

            </div>

        </div>

    </div>

</section>

{{-- ========================================================= --}}
{{-- FEATURED COLLECTION --}}
{{-- ========================================================= --}}

<section class="py-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex items-end justify-between mb-14">

            <div>

                <span class="text-[#D4AF37] font-semibold tracking-[4px] uppercase text-sm">
                    Collection
                </span>

                <h2
                    class="mt-4 text-4xl lg:text-5xl font-bold font-['Playfair_Display']"
                >
                    Featured Collection
                </h2>

            </div>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @php

                $collections = [

                    [
                        'title' => 'Premium Collection',
                        'image' => 'https://plus.unsplash.com/premium_photo-1680012590879-39a8ec7c7cea?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3Dq=80&w=1200',
                    ],

                    [
                        'title' => 'New Arrival',
                        'image' => 'https://images.unsplash.com/photo-1736342181249-9e81c11737b8?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D=80&w=1200',
                    ],

                    [
                        'title' => 'Best Seller',
                        'image' => 'https://plus.unsplash.com/premium_photo-1679064458881-76904cf6d1aa?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8aGlqYWJ8ZW58MHx8MHx8fDA%3D2=80&w=1200',
                    ],

                    [
                        'title' => 'Office Collection',
                        'image' => 'https://images.unsplash.com/photo-1746366618640-9b0257c3cd64?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8aGlqYWIlMjBmb3JtYWx8ZW58MHx8MHx8fDA%3D=80&w=1200',
                    ],

                    [
                        'title' => 'Wedding Collection',
                        'image' => 'https://plus.unsplash.com/premium_photo-1669833530652-8503de1bd6d7?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTN8fGhpamFifGVufDB8fDB8fHww=80&w=1200',
                    ],

                    [
                        'title' => 'Luxury Silk',
                        'image' => 'https://images.unsplash.com/photo-1651313950238-7f569c1fc2ba?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjR8fGhpamFifGVufDB8fDB8fHww=80&w=1200',
                    ],

                ];

            @endphp

            @foreach($collections as $collection)

                <div
                    class="group bg-white rounded-[30px] overflow-hidden border border-[#ECECEC] shadow-sm hover:shadow-2xl transition-all duration-500"
                >

                    <div class="overflow-hidden">

                        <img
                            src="{{ $collection['image'] }}"
                            class="w-full h-[360px] object-cover group-hover:scale-105 transition duration-700"
                        >

                    </div>

                    <div class="p-8">

                        <h3 class="text-2xl font-bold">

                            {{ $collection['title'] }}

                        </h3>

                        <p class="mt-4 text-gray-500 leading-8">

                            Elegant premium collection designed
                            for modern women.

                        </p>

                        <a
                            href="{{ route('shop') }}"
                            class="mt-6 inline-flex items-center gap-3 text-[#0B5D4B] font-semibold"
                        >
                            Explore Collection →
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

{{-- ========================================================= --}}
{{-- PROMOTION --}}
{{-- ========================================================= --}}

<section class="pb-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div
            class="bg-[#0B5D4B] rounded-[40px] p-10 lg:p-16 text-white"
        >

            <div class="grid lg:grid-cols-2 gap-10 items-center">

                <div>

                    <span class="text-[#D4AF37] uppercase tracking-[4px] text-sm">
                        Promotion
                    </span>

                    <h2
                        class="mt-5 text-4xl lg:text-5xl font-bold font-['Playfair_Display'] leading-tight"
                    >
                        Latest Promotions &
                        Announcements
                    </h2>

                    <p class="mt-6 text-white/80 leading-8">

                        Enjoy exclusive luxury collections and
                        limited special offers only at Kayla Hijab.

                    </p>

                </div>

                <div class="grid gap-5">

                    @foreach([
                        'Ramadan Special Collection',
                        'Buy 2 Get 1',
                        'Free Shipping',
                    ] as $promo)

                        <div
                            class="bg-white/10 border border-white/10 rounded-[24px] p-6 backdrop-blur-sm"
                        >

                            <div class="flex items-center justify-between">

                                <div>

                                    <h3 class="text-xl font-semibold">
                                        {{ $promo }}
                                    </h3>

                                    <p class="text-white/70 mt-2 text-sm">
                                        Published July 2026
                                    </p>

                                </div>

                                <a
                                    href="#"
                                    class="text-[#D4AF37]"
                                >
                                    Read More →
                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>

{{-- ========================================================= --}}
{{-- NEW ARRIVAL --}}
{{-- ========================================================= --}}

<section class="pb-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="mb-14">

            <span class="text-[#D4AF37] uppercase tracking-[4px] text-sm">
                New Arrival
            </span>

            <h2
                class="mt-4 text-4xl lg:text-5xl font-bold font-['Playfair_Display']"
            >
                Latest Products
            </h2>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($products as $product)

                <div
                    class="group bg-white rounded-[30px] overflow-hidden border border-[#ECECEC] hover:shadow-2xl transition-all duration-500"
                >

                    <a
                        href="{{ route('product.show', $product->slug) }}"
                    >

                        <div class="relative overflow-hidden">

                            <img
                                src="{{ asset('storage/' . $product->thumbnail) }}"
                                class="w-full h-[360px] object-cover group-hover:scale-105 transition duration-700"
                            >

                            <div
                                class="absolute top-5 left-5 px-4 py-2 rounded-full bg-[#0B5D4B] text-white text-xs"
                            >
                                NEW
                            </div>

                        </div>

                    </a>

                    <div class="p-6">

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-1 text-[#D4AF37]">

                                ★★★★★

                            </div>

                            <button>
                                ❤️
                            </button>

                        </div>

                        <h3 class="mt-4 text-xl font-semibold">

                            {{ $product->name }}

                        </h3>

                        <div class="mt-4 flex items-center gap-4">

                            <span class="text-2xl font-bold text-[#0B5D4B]">

                                Rp {{ number_format($product->price) }}

                            </span>

                        </div>

                        <form
                            action="{{ route('cart.add', $product->id) }}"
                            method="POST"
                            class="mt-6"
                        >

                            @csrf

                            <button
                                class="w-full h-12 rounded-2xl bg-[#0B5D4B] text-white hover:bg-[#084C3D] transition-all duration-300"
                            >
                                Add To Cart
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

{{-- ========================================================= --}}
{{-- WHY CHOOSE US --}}
{{-- ========================================================= --}}

<section class="pb-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="text-center mb-16">

            <span class="text-[#D4AF37] uppercase tracking-[4px] text-sm">
                Why Choose Us
            </span>

            <h2
                class="mt-4 text-4xl lg:text-5xl font-bold font-['Playfair_Display']"
            >
                Crafted For Elegance
            </h2>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach([
                'Premium Fabric',
                'Comfortable',
                'Elegant Design',
                'Premium Packaging',
                'Secure Payment',
                'Fast Delivery'
            ] as $item)

                <div
                    class="bg-white rounded-[30px] border border-[#ECECEC] p-10 text-center hover:shadow-xl transition-all duration-500"
                >

                    <div
                        class="w-16 h-16 rounded-2xl bg-[#0B5D4B]/10 text-[#0B5D4B] flex items-center justify-center text-3xl mx-auto"
                    >
                        ✨
                    </div>

                    <h3 class="mt-6 text-2xl font-semibold">

                        {{ $item }}

                    </h3>

                    <p class="mt-4 text-gray-500 leading-8">

                        Luxury experience designed specially
                        for modern Muslim women.

                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>

{{-- ========================================================= --}}
{{-- DELIVERY PROCESS --}}
{{-- ========================================================= --}}

<section class="pb-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div
            class="bg-white rounded-[40px] border border-[#ECECEC] p-10 lg:p-16"
        >

            <div class="text-center mb-16">

                <span class="text-[#D4AF37] uppercase tracking-[4px] text-sm">
                    Delivery
                </span>

                <h2
                    class="mt-4 text-4xl lg:text-5xl font-bold font-['Playfair_Display']"
                >
                    How We Deliver Your Order
                </h2>

            </div>

            <div class="grid lg:grid-cols-4 gap-8">

                @foreach([
                    'Order Confirmed',
                    'Product Packed Carefully',
                    'Courier Pickup',
                    'Delivered Safely'
                ] as $step)

                    <div class="text-center">

                        <div
                            class="w-20 h-20 rounded-full bg-[#0B5D4B] text-white flex items-center justify-center mx-auto text-2xl shadow-lg"
                        >
                            {{ $loop->iteration }}
                        </div>

                        <h3 class="mt-6 text-xl font-semibold">

                            {{ $step }}

                        </h3>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>

{{-- ========================================================= --}}
{{-- NEWSLETTER --}}
{{-- ========================================================= --}}

<section class="pb-24">

    <div class="max-w-5xl mx-auto px-6 lg:px-8">

        <div
            class="bg-[#0B5D4B] rounded-[40px] p-10 lg:p-16 text-center text-white"
        >

            <span class="text-[#D4AF37] uppercase tracking-[4px] text-sm">
                Newsletter
            </span>

            <h2
                class="mt-5 text-4xl lg:text-5xl font-bold font-['Playfair_Display']"
            >
                Stay Updated
            </h2>

            <p class="mt-6 text-white/80 leading-8 max-w-2xl mx-auto">

                Receive exclusive offers, luxury collections,
                and premium styling inspiration.

            </p>

            <form
                class="mt-10 flex flex-col lg:flex-row gap-4 max-w-2xl mx-auto"
            >

                <input
                    type="email"
                    placeholder="Enter your email"
                    class="flex-1 h-14 rounded-2xl px-6 text-[#1F2937] outline-none"
                >

                <button
                    class="h-14 px-8 rounded-2xl bg-[#D4AF37] text-white font-semibold hover:opacity-90 transition-all duration-300"
                >
                    Subscribe
                </button>

            </form>

        </div>

    </div>

</section>

@endsection

