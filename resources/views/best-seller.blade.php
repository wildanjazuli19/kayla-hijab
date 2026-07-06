@extends('layouts.app')

@section('content')

<section class="bg-[#FAF9F6] min-h-screen">

    <section class="relative h-[70vh] overflow-hidden">

        <img
            src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f"
            class="absolute inset-0 w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 h-full flex items-center">

            <div class="max-w-7xl mx-auto px-6">

                <h1 class="text-6xl text-white font-bold">
                    Best Seller Collection
                </h1>

                <p class="mt-6 text-xl text-gray-200 max-w-2xl">
                    Our customers' most loved hijab collections.
                </p>

            </div>

        </div>

    </section>

</section>

@endsection