@extends('layouts.app')

@section('content')

<section class="bg-[#FAF9F6] min-h-screen py-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <h1 class="text-6xl font-bold text-[#1F2937]">
                Our Collection
            </h1>

            <p class="mt-6 text-xl text-gray-500">
                Timeless elegance for every occasion.
            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 mt-20">

            @foreach([
                'Pashmina',
                'Square Hijab',
                'Instant Hijab',
                'Voal Collection',
                'Silk Collection',
                'Accessories'
            ] as $category)

                <div class="group relative overflow-hidden rounded-[30px]">

                    <img
                        src="https://images.unsplash.com/photo-1496747611176-843222e1e57c"
                        class="w-full h-[500px] object-cover group-hover:scale-105 transition duration-700"
                    >

                    <div class="absolute inset-0 bg-black/30"></div>

                    <div class="absolute bottom-10 left-10">

                        <h3 class="text-3xl text-white font-semibold">
                            {{ $category }}
                        </h3>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection