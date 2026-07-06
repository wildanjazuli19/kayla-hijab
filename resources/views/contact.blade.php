@extends('layouts.app')

@section('content')

<section class="bg-[#FAF9F6] py-24 min-h-screen">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <h1 class="text-6xl font-bold text-[#1F2937]">
                Contact Us
            </h1>

            <p class="mt-6 text-xl text-gray-500">
                We would love to hear from you.
            </p>

        </div>

        <div class="grid lg:grid-cols-2 gap-14 mt-20">

            {{-- LEFT --}}
            <div class="bg-white rounded-[30px] p-10 shadow-sm border border-[#E5E7EB]">

                <h2 class="text-3xl font-semibold text-[#1F2937]">
                    Contact Information
                </h2>

                <div class="mt-10 space-y-7 text-lg">

                    <p>📍 Jakarta, Indonesia</p>

                    <p>📞 +62 812 3456 7890</p>

                    <p>✉️ hello@kaylahijab.com</p>

                    <p>🕘 Mon - Sat : 09.00 - 21.00</p>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="bg-white rounded-[30px] p-10 shadow-sm border border-[#E5E7EB]">

                <form class="space-y-6">

                    <input
                        type="text"
                        placeholder="Full Name"
                        class="w-full h-16 rounded-2xl border border-[#E5E7EB] px-6"
                    >

                    <input
                        type="email"
                        placeholder="Email"
                        class="w-full h-16 rounded-2xl border border-[#E5E7EB] px-6"
                    >

                    <textarea
                        rows="6"
                        placeholder="Message"
                        class="w-full rounded-2xl border border-[#E5E7EB] p-6"
                    ></textarea>

                    <button
                        class="w-full h-16 rounded-full bg-[#0B5D4B] hover:bg-[#D4AF37] text-white transition"
                    >
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection