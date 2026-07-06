@extends('layouts.app')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative h-[700px] overflow-hidden">

    <img
        src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f"
        class="absolute inset-0 w-full h-full object-cover"
    >

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 container mx-auto px-6 lg:px-16 h-full flex items-center">

        <div class="max-w-3xl text-white">

            <span class="inline-flex items-center rounded-full border border-white/20 bg-white/10 backdrop-blur-xl px-5 py-2 text-sm tracking-[3px] uppercase">
                About Kayla Hijab
            </span>

            <h1 class="mt-8 text-6xl lg:text-7xl font-bold leading-tight">
                Timeless Elegance
                <br>
                for Modern Muslim Women
            </h1>

            <p class="mt-8 text-xl leading-relaxed text-gray-200 max-w-2xl">
                Kayla Hijab is a premium Muslim fashion brand dedicated to creating elegant, luxurious, and timeless hijab collections designed for confident modern women.
            </p>

        </div>

    </div>

</section>

{{-- ================= STORY ================= --}}
<section class="bg-[#FAF9F6] py-28">

    <div class="container mx-auto px-6 lg:px-16">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <div>

                <span class="text-[#D4AF37] tracking-[4px] uppercase text-sm">
                    Our Story
                </span>

                <h2 class="mt-6 text-5xl font-bold text-[#1F2937] leading-tight">
                    Crafted with Passion,
                    Inspired by Elegance
                </h2>

                <p class="mt-8 text-lg leading-relaxed text-gray-600">
                    Founded with a vision to redefine Muslim fashion, Kayla Hijab combines luxurious fabrics, modern silhouettes, and timeless elegance into every collection.
                </p>

                <p class="mt-6 text-lg leading-relaxed text-gray-600">
                    We believe every Muslim woman deserves to feel confident, graceful, and beautiful in what she wears — without compromising comfort or modesty.
                </p>

            </div>

            <div class="relative">

                <img
                    src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b"
                    class="rounded-[40px] shadow-2xl"
                >

            </div>

        </div>

    </div>

</section>

{{-- ================= VALUES ================= --}}
<section class="py-28 bg-white">

    <div class="container mx-auto px-6 lg:px-16">

        <div class="text-center max-w-3xl mx-auto">

            <span class="text-[#D4AF37] tracking-[4px] uppercase text-sm">
                Our Values
            </span>

            <h2 class="mt-6 text-5xl font-bold text-[#1F2937]">
                The Essence of Kayla Hijab
            </h2>

        </div>

        <div class="grid md:grid-cols-3 gap-10 mt-20">

            {{-- VALUE --}}
            <div class="bg-[#FAF9F6] rounded-[30px] p-10 shadow-sm hover:shadow-2xl transition duration-500">

                <div class="text-5xl">
                    ✨
                </div>

                <h3 class="mt-8 text-2xl font-bold text-[#1F2937]">
                    Premium Quality
                </h3>

                <p class="mt-5 text-gray-600 leading-relaxed">
                    We carefully select premium materials to ensure luxurious comfort and long-lasting elegance.
                </p>

            </div>

            {{-- VALUE --}}
            <div class="bg-[#FAF9F6] rounded-[30px] p-10 shadow-sm hover:shadow-2xl transition duration-500">

                <div class="text-5xl">
                    🌿
                </div>

                <h3 class="mt-8 text-2xl font-bold text-[#1F2937]">
                    Modest Fashion
                </h3>

                <p class="mt-5 text-gray-600 leading-relaxed">
                    Elegant modest fashion crafted to empower women while embracing timeless sophistication.
                </p>

            </div>

            {{-- VALUE --}}
            <div class="bg-[#FAF9F6] rounded-[30px] p-10 shadow-sm hover:shadow-2xl transition duration-500">

                <div class="text-5xl">
                    🤍
                </div>

                <h3 class="mt-8 text-2xl font-bold text-[#1F2937]">
                    Customer Experience
                </h3>

                <p class="mt-5 text-gray-600 leading-relaxed">
                    We are committed to delivering a seamless luxury shopping experience for every customer.
                </p>

            </div>

        </div>

    </div>

</section>

{{-- ================= STATS ================= --}}
<section class="bg-[#0B5D4B] py-24">

    <div class="container mx-auto px-6 lg:px-16">

        <div class="grid md:grid-cols-4 gap-10 text-center text-white">

            <div>

                <h3 class="text-6xl font-bold">
                    10+
                </h3>

                <p class="mt-4 text-gray-200">
                    Years Experience
                </p>

            </div>

            <div>

                <h3 class="text-6xl font-bold">
                    50K+
                </h3>

                <p class="mt-4 text-gray-200">
                    Happy Customers
                </p>

            </div>

            <div>

                <h3 class="text-6xl font-bold">
                    100K+
                </h3>

                <p class="mt-4 text-gray-200">
                    Products Sold
                </p>

            </div>

            <div>

                <h3 class="text-6xl font-bold">
                    20+
                </h3>

                <p class="mt-4 text-gray-200">
                    Countries Served
                </p>

            </div>

        </div>

    </div>

</section>

{{-- ================= TEAM ================= --}}
<section class="bg-[#FAF9F6] py-28">

    <div class="container mx-auto px-6 lg:px-16">

        <div class="text-center max-w-3xl mx-auto">

            <span class="text-[#D4AF37] tracking-[4px] uppercase text-sm">
                Meet Our Team
            </span>

            <h2 class="mt-6 text-5xl font-bold text-[#1F2937]">
                The Creative Minds Behind Kayla Hijab
            </h2>

        </div>

        <div class="grid md:grid-cols-3 gap-10 mt-20">

            {{-- MEMBER --}}
            <div class="text-center">

                <img
                    src="https://randomuser.me/api/portraits/women/44.jpg"
                    class="w-full h-[450px] object-cover rounded-[30px]"
                >

                <h3 class="mt-8 text-2xl font-bold text-[#1F2937]">
                    Kayla Azzahra
                </h3>

                <p class="mt-2 text-[#D4AF37]">
                    Founder & Creative Director
                </p>

            </div>

            {{-- MEMBER --}}
            <div class="text-center">

                <img
                    src="https://randomuser.me/api/portraits/women/68.jpg"
                    class="w-full h-[450px] object-cover rounded-[30px]"
                >

                <h3 class="mt-8 text-2xl font-bold text-[#1F2937]">
                    Nadia Putri
                </h3>

                <p class="mt-2 text-[#D4AF37]">
                    Fashion Designer
                </p>

            </div>

            {{-- MEMBER --}}
            <div class="text-center">

                <img
                    src="https://randomuser.me/api/portraits/women/65.jpg"
                    class="w-full h-[450px] object-cover rounded-[30px]"
                >

                <h3 class="mt-8 text-2xl font-bold text-[#1F2937]">
                    Aulia Rahma
                </h3>

                <p class="mt-2 text-[#D4AF37]">
                    Brand Manager
                </p>

            </div>

        </div>

    </div>

</section>

{{-- ================= CTA ================= --}}
<section class="py-28 bg-white">

    <div class="container mx-auto px-6 lg:px-16">

        <div class="rounded-[50px] bg-[#0B5D4B] px-10 py-24 text-center text-white">

            <h2 class="text-5xl font-bold leading-tight">
                Discover Luxury Muslim Fashion
            </h2>

            <p class="mt-8 text-xl text-gray-200 max-w-3xl mx-auto">
                Explore our exclusive collections crafted with elegance, sophistication, and timeless beauty.
            </p>

            <a
                href="/shop"
                class="inline-flex items-center justify-center mt-10 h-16 px-10 rounded-full bg-[#D4AF37] hover:bg-white hover:text-[#0B5D4B] transition duration-300 text-lg font-medium"
            >
                Explore Collection
            </a>

        </div>

    </div>

</section>

@endsection