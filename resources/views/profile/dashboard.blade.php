@extends('layouts.app')

@section('content')

<section class="bg-[#FAF9F6] min-h-screen pt-32 pb-24">

    <div class="max-w-7xl mx-auto px-6">

        {{-- PROFILE HEADER --}}
        <div class="relative rounded-[40px] overflow-hidden shadow-xl">

            <img
                src="https://images.unsplash.com/photo-1496747611176-843222e1e57c"
                class="w-full h-[320px] object-cover"
            >

            <div class="absolute inset-0 bg-black/40"></div>

            <div class="absolute bottom-10 left-10 flex items-center gap-8">

                <img
                    src="https://i.pravatar.cc/200"
                    class="w-32 h-32 rounded-full border-4 border-white object-cover"
                >

                <div class="text-white">

                    <h1 class="text-4xl font-bold">
                        {{ auth()->user()->name }}
                    </h1>

                    <div class="mt-4 flex items-center gap-4">

                        <span class="px-4 py-2 rounded-full bg-[#D4AF37] text-sm">
                            Gold Member
                        </span>

                        <span class="text-gray-200">
                            Member Since 2024
                        </span>

                    </div>

                </div>

            </div>

        </div>

        <div class="grid lg:grid-cols-12 gap-10 mt-16">

            {{-- SIDEBAR --}}
            <div class="lg:col-span-3">

                <div class="bg-white rounded-[30px] p-8 shadow-sm border border-[#E5E7EB]">

                    <div class="space-y-3">

                        @foreach([
                            'Dashboard',
                            'My Profile',
                            'Order History',
                            'Wishlist',
                            'Addresses',
                            'Payment Methods',
                            'Notifications',
                            'Security',
                            'Settings',
                            'Logout'
                        ] as $menu)

                            <a
                                href="#"
                                class="flex items-center px-5 h-14 rounded-2xl hover:bg-[#0B5D4B] hover:text-white transition"
                            >
                                {{ $menu }}
                            </a>

                        @endforeach

                    </div>

                </div>

            </div>

            {{-- CONTENT --}}
            <div class="lg:col-span-9">

                {{-- STATS --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                    @foreach([
                        ['My Orders', '12'],
                        ['Wishlist', '24'],
                        ['Reward Points', '3.240'],
                        ['Coupons', '5']
                    ] as $item)

                        <div class="bg-white rounded-[30px] p-8 shadow-sm border border-[#E5E7EB]">

                            <h3 class="text-gray-500">
                                {{ $item[0] }}
                            </h3>

                            <p class="mt-4 text-4xl font-bold text-[#1F2937]">
                                {{ $item[1] }}
                            </p>

                        </div>

                    @endforeach

                </div>

                {{-- PROFILE --}}
                <div class="mt-10 bg-white rounded-[30px] p-10 shadow-sm border border-[#E5E7EB]">

                    <h2 class="text-3xl font-bold text-[#1F2937]">
                        My Profile
                    </h2>

                    <form class="mt-10 grid md:grid-cols-2 gap-6">

                        <input
                            type="text"
                            value="{{ auth()->user()->name }}"
                            class="h-16 rounded-2xl border border-[#E5E7EB] px-6"
                        >

                        <input
                            type="email"
                            value="{{ auth()->user()->email }}"
                            class="h-16 rounded-2xl border border-[#E5E7EB] px-6"
                        >

                        <input
                            type="text"
                            placeholder="Phone"
                            class="h-16 rounded-2xl border border-[#E5E7EB] px-6"
                        >

                        <input
                            type="text"
                            placeholder="Gender"
                            class="h-16 rounded-2xl border border-[#E5E7EB] px-6"
                        >

                        <textarea
                            rows="5"
                            placeholder="Bio"
                            class="md:col-span-2 rounded-2xl border border-[#E5E7EB] p-6"
                        ></textarea>

                        <div class="md:col-span-2 flex gap-5">

                            <button
                                class="h-16 px-10 rounded-full bg-[#0B5D4B] hover:bg-[#D4AF37] text-white transition"
                            >
                                Save Changes
                            </button>

                            <button
                                class="h-16 px-10 rounded-full border border-[#E5E7EB]"
                            >
                                Cancel
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection