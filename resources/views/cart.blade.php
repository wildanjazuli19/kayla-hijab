@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 lg:px-8 py-14">

    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}

    <div class="mb-14">

        {{-- BREADCRUMB --}}
        <div class="flex items-center gap-3 text-sm text-gray-500">

            <a
                href="{{ route('home') }}"
                class="hover:text-[#0B5D4B] transition">
                Home
            </a>

            <span>
                /
            </span>

            <span class="text-[#1F2937] font-medium">
                Cart
            </span>

        </div>

        {{-- TITLE --}}
        <div class="mt-6">

            <h1
                class="text-4xl lg:text-5xl font-bold text-[#1F2937] font-['Playfair_Display']">
                Shopping Cart
            </h1>

            <p class="text-gray-500 mt-4 text-lg">

                Review your selected items before proceeding to checkout.

            </p>

        </div>

    </div>

    {{-- ========================================================= --}}
    {{-- EMPTY CART --}}
    {{-- ========================================================= --}}

    @if(count($cart) < 1)

        <div
        class="bg-white rounded-[32px] border border-[#ECECEC] shadow-sm p-14 text-center">

        <div class="text-7xl mb-8">
            🛒
        </div>

        <h2
            class="text-3xl font-bold text-[#1F2937] font-['Playfair_Display']">
            Your Shopping Cart is Empty
        </h2>

        <p class="text-gray-500 mt-5 max-w-xl mx-auto leading-8">

            Looks like you haven't added anything yet.
            Explore our premium luxury collections crafted for elegance and comfort.

        </p>

        <a
            href="{{ route('shop') }}"
            class="inline-flex items-center justify-center h-14 px-8 mt-10 rounded-2xl bg-[#0B5D4B] text-white font-semibold shadow-lg hover:bg-[#084C3D] transition-all duration-300">
            Explore Collection
        </a>

</div>

@else

@php

$subtotal = 0;

foreach($cart as $id => $details) {

$subtotal += $details['price'] * $details['quantity'];

}

$shipping = 0;

$tax = 0;

$discount = 0;

$total = $subtotal + $shipping + $tax - $discount;

@endphp

<div class="grid lg:grid-cols-[1.7fr_0.8fr] gap-10">

    {{-- ========================================================= --}}
    {{-- LEFT SIDE --}}
    {{-- ========================================================= --}}

    <div class="space-y-8">

        @foreach($cart as $id => $details)

        <div
            class="bg-white rounded-[32px] border border-[#ECECEC] shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">

            <div class="p-6 lg:p-8">

                <div class="flex flex-col lg:flex-row gap-8">

                    {{-- IMAGE --}}
                    <div class="w-full lg:w-[240px] shrink-0">

                        <div
                            class="overflow-hidden rounded-[28px] bg-[#F8F8F8]">

                            <img
                                src="{{ isset($details['thumbnail']) && $details['thumbnail']
                                                ? asset('storage/' . $details['thumbnail'])
                                                : 'https://via.placeholder.com/600x600?text=Kayla+Hijab'
                                            }}"
                                alt="{{ $details['name'] }}"
                                class="w-full h-[260px] object-cover hover:scale-105 transition-all duration-700">

                        </div>

                    </div>

                    {{-- PRODUCT INFO --}}
                    <div class="flex-1">

                        <div class="flex items-start justify-between gap-6">

                            <div>

                                <p
                                    class="text-sm uppercase tracking-[3px] text-[#0B5D4B] font-semibold">
                                    Luxury Collection
                                </p>

                                <h2
                                    class="mt-3 text-2xl lg:text-3xl font-bold text-[#1F2937] font-['Playfair_Display']">
                                    {{ $details['name'] }}
                                </h2>

                            </div>

                            {{-- REMOVE --}}
                            <form
                                action="{{ route('cart.remove', $id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="w-12 h-12 rounded-2xl border border-[#ECECEC] hover:bg-red-50 hover:border-red-200 transition-all duration-300 flex items-center justify-center">
                                    🗑️
                                </button>

                            </form>

                        </div>

                        {{-- PRODUCT META --}}
                        <div class="mt-6 grid md:grid-cols-2 gap-5">

                            <div
                                class="bg-[#FAF9F6] rounded-2xl p-5 border border-[#ECECEC]">

                                <p class="text-sm text-gray-500">
                                    Selected Size
                                </p>

                                <h4 class="mt-2 font-semibold text-[#1F2937]">
                                    {{ $details['size'] ?? 'Premium Size' }}
                                </h4>

                            </div>

                            <div
                                class="bg-[#FAF9F6] rounded-2xl p-5 border border-[#ECECEC]">

                                <p class="text-sm text-gray-500">
                                    Stock Status
                                </p>

                                <h4 class="mt-2 font-semibold text-[#0B5D4B]">
                                    ✔ Ready Stock
                                </h4>

                            </div>

                        </div>

                        {{-- PRICE --}}
                        <div class="mt-8 flex flex-wrap items-center justify-between gap-6">

                            <div>

                                <p class="text-sm text-gray-500">
                                    Price
                                </p>

                                <h3
                                    class="mt-2 text-3xl font-bold text-[#0B5D4B]">
                                    Rp {{ number_format($details['price']) }}
                                </h3>

                            </div>

                            {{-- QUANTITY --}}
                            <div
                                class="flex items-center border border-[#ECECEC] rounded-2xl overflow-hidden">

                                <button
                                    class="w-14 h-14 flex items-center justify-center text-xl hover:bg-[#FAF9F6] transition">
                                    -
                                </button>

                                <div
                                    class="w-16 text-center font-semibold">
                                    {{ $details['quantity'] }}
                                </div>

                                <button
                                    class="w-14 h-14 flex items-center justify-center text-xl hover:bg-[#FAF9F6] transition">
                                    +
                                </button>

                            </div>

                        </div>

                        {{-- SUBTOTAL --}}
                        <div
                            class="mt-8 pt-6 border-t border-[#ECECEC] flex items-center justify-between">

                            <span class="text-gray-500">
                                Subtotal
                            </span>

                            <h3
                                class="text-2xl font-bold text-[#1F2937]">
                                Rp {{ number_format($details['price'] * $details['quantity']) }}
                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    {{-- ========================================================= --}}
    {{-- RIGHT SIDE --}}
    {{-- ========================================================= --}}

    <div>

        <div
            class="sticky top-28 space-y-6">

            {{-- ORDER SUMMARY --}}
            <div
                class="bg-white rounded-[32px] border border-[#ECECEC] shadow-sm p-8">

                <h2
                    class="text-3xl font-bold text-[#1F2937] font-['Playfair_Display']">
                    Order Summary
                </h2>

                <div class="mt-10 space-y-5">

                    <div class="flex items-center justify-between">

                        <span class="text-gray-500">
                            Subtotal
                        </span>

                        <span class="font-semibold">
                            Rp {{ number_format($subtotal) }}
                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <span class="text-gray-500">
                            Discount
                        </span>

                        <span class="font-semibold text-red-500">
                            - Rp {{ number_format($discount) }}
                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <span class="text-gray-500">
                            Shipping
                        </span>

                        <span class="font-semibold">
                            Free
                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <span class="text-gray-500">
                            Tax
                        </span>

                        <span class="font-semibold">
                            Rp {{ number_format($tax) }}
                        </span>

                    </div>

                </div>

                {{-- DIVIDER --}}
                <div class="my-8 border-t border-dashed border-[#E5E7EB]"></div>

                {{-- TOTAL --}}
                <div class="flex items-center justify-between">

                    <span class="text-lg font-semibold">
                        Grand Total
                    </span>

                    <h3
                        class="text-3xl font-bold text-[#0B5D4B]">
                        Rp {{ number_format($total) }}
                    </h3>

                </div>

                {{-- COUPON --}}
                <div class="mt-8">

                    <label class="block mb-3 font-medium">
                        Coupon Code
                    </label>

                    <div class="flex gap-3">

                        <input
                            type="text"
                            placeholder="Enter coupon"
                            class="flex-1 h-14 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-5 outline-none focus:border-[#0B5D4B]">

                        <button
                            class="h-14 px-6 rounded-2xl bg-[#0B5D4B] text-white font-semibold hover:bg-[#084C3D] transition-all duration-300">
                            Apply
                        </button>

                    </div>

                </div>

                {{-- BUTTONS --}}
                <div class="mt-10 space-y-4">

                    <a
                        href="{{ route('checkout') }}"
                        class="w-full h-14 rounded-2xl bg-[#0B5D4B] text-white font-semibold flex items-center justify-center hover:bg-[#083C31] transition-all duration-300 shadow-lg">
                        Proceed To Checkout
                    </a>

                    <a
                        href="{{ route('shop') }}"
                        class="w-full h-14 rounded-2xl border border-[#E5E7EB] bg-white hover:bg-[#FAF9F6] transition-all duration-300 flex items-center justify-center font-semibold">
                        Continue Shopping
                    </a>

                </div>

            </div>

            {{-- SECURE --}}
            <div
                class="mt-8 p-5 rounded-2xl bg-[#FAF9F6] border border-[#ECECEC]">

                <div class="flex items-center gap-3">

                    <div class="text-2xl">
                        🔒
                    </div>

                    <div>

                        <h4 class="font-semibold">
                            Secure Checkout
                        </h4>

                        <p class="text-sm text-gray-500 mt-1">
                            SSL Protected Payment
                        </p>

                    </div>

                </div>

            </div>

        </div>

        {{-- TRUST BADGES --}}
        <div
            class="bg-white rounded-[32px] border border-[#ECECEC] shadow-sm p-8">

            <h3
                class="text-2xl font-bold font-['Playfair_Display']">
                Why Shop With Us
            </h3>

            <div class="mt-8 space-y-5">

                <div class="flex items-center gap-4">

                    <div class="text-2xl">
                        💳
                    </div>

                    <span class="font-medium">
                        Secure Payment
                    </span>

                </div>

                <div class="flex items-center gap-4">

                    <div class="text-2xl">
                        🎁
                    </div>

                    <span class="font-medium">
                        Premium Packaging
                    </span>

                </div>

                <div class="flex items-center gap-4">

                    <div class="text-2xl">
                        🚚
                    </div>

                    <span class="font-medium">
                        Free Shipping
                    </span>

                </div>

                <div class="flex items-center gap-4">

                    <div class="text-2xl">
                        ↩️
                    </div>

                    <span class="font-medium">
                        Easy Return
                    </span>

                </div>

                <div class="flex items-center gap-4">

                    <div class="text-2xl">
                        ✨
                    </div>

                    <span class="font-medium">
                        Original Product
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

@endif

</div>

@endsection