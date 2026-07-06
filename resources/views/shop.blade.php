@extends('layouts.app')

@section('content')

<section class="bg-[#FAF9F6] py-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        {{-- HEADER --}}
        <div class="text-center mb-20">

            <span
                class="inline-block px-5 py-2 rounded-full bg-[#F4EFE8] text-[#0B5D4B] text-sm tracking-[3px] uppercase mb-6"
            >
                Luxury Collection
            </span>

            <h1
                class="text-5xl lg:text-6xl font-[Playfair_Display] text-[#2D2D2D]"
            >
                Shop Collection
            </h1>

            <p class="mt-6 text-lg text-gray-500 max-w-2xl mx-auto">
                Discover premium hijab collections crafted with elegance,
                comfort, and timeless beauty.
            </p>

        </div>

        {{-- PRODUCT GRID --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10">

            @foreach($products as $product)

                <div
                    class="group bg-white rounded-[32px] overflow-hidden border border-[#F1ECE4] hover:border-[#D4AF37] transition duration-500 shadow-sm hover:shadow-2xl"
                >

                    {{-- IMAGE --}}
                    <div class="overflow-hidden">

                        <img
                             src="{{ $product->thumbnail
        ? asset('storage/' . $product->thumbnail)
        : 'https://via.placeholder.com/600x600?text=Kayla+Hijab'
    }}"
    alt="{{ $product->name }}"
    class="w-full h-[420px] object-cover group-hover:scale-105 transition duration-700"
                        >

                    </div>

                    {{-- CONTENT --}}
                    <div class="p-7">

                        <div class="flex items-center justify-between">

                            <span
                                class="text-xs uppercase tracking-[2px] text-gray-400"
                            >
                                Premium
                            </span>

                            <button
                                class="text-xl hover:text-[#D4AF37] transition"
                            >
                                🤍
                            </button>

                        </div>

                        <h3
                            class="mt-4 text-2xl font-semibold text-[#2D2D2D]"
                        >
                            {{ $product->name }}
                        </h3>

                        <div class="flex items-center gap-1 mt-3 text-[#D4AF37]">
                            ★★★★★
                        </div>

                        <div class="mt-5 flex items-center justify-between">

                            <span
                                class="text-2xl font-bold text-[#0B5D4B]"
                            >
                                Rp {{ number_format($product->price) }}
                            </span>

                            <span
                                class="bg-[#D4AF37] text-white text-xs px-3 py-1 rounded-full"
                            >
                                SALE
                            </span>

                        </div>

                        {{-- BUTTON --}}
                        <div class="mt-8 flex items-center gap-3">

                            <a
                                href="{{ url('/product/' . $product->id) }}"
                                class="flex-1 h-14 rounded-full border border-[#0B5D4B] text-[#0B5D4B] hover:bg-[#0B5D4B] hover:text-white transition flex items-center justify-center"
                            >
                                Detail
                            </a>

                            <form
                                action="{{ route('cart.add', $product->id) }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="px-6 h-14 rounded-full bg-[#0B5D4B] hover:bg-[#084638] text-white transition"
                                >
                                    Add
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection