
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Kayla Hijab
    </title>

    {{-- GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
   >

    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
   <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

</head>

<body class="bg-[#FAF9F6] text-[#1F2937] font-['Inter'] antialiased">

    {{-- ========================================================= --}}
    {{-- NAVBAR --}}
    {{-- ========================================================= --}}

    <header
        class="sticky top-0 z-50 border-b border-[#ECECEC] bg-white/90 backdrop-blur-xl transition-all duration-300"
    >

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="h-20 flex items-center justify-between">

                {{-- LOGO --}}
                <a
                    href="{{ route('home') }}"
                    class="flex items-center gap-4 shrink-0"
                >

                    <div
                        class="w-12 h-12 rounded-2xl bg-[#0B5D4B] text-white flex items-center justify-center font-bold shadow-lg"
                    >
                        KH
                    </div>

                    <div>

                        <h1
                            class="text-2xl font-bold tracking-wide font-['Playfair_Display']"
                        >
                            Kayla Hijab
                        </h1>

                        <p class="text-xs text-gray-500 tracking-[2px] uppercase mt-0.5">
                            Luxury Fashion
                        </p>

                    </div>

                </a>

                {{-- DESKTOP MENU --}}
                <nav
                    class="hidden lg:flex items-center gap-10"
                >

                    <a
                        href="{{ route('home') }}"
                        class="text-sm font-medium hover:text-[#0B5D4B] transition-all duration-300"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('shop') }}"
                        class="text-sm font-medium hover:text-[#0B5D4B] transition-all duration-300"
                    >
                        Products
                    </a>

                    <a
                        href="{{ route('about') }}"
                        class="text-sm font-medium hover:text-[#0B5D4B] transition-all duration-300"
                    >
                        About
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="text-sm font-medium hover:text-[#0B5D4B] transition-all duration-300"
                    >
                        Contact
                    </a>

                </nav>

                {{-- RIGHT ACTION --}}
                <div class="flex items-center gap-3">

                    {{-- SEARCH --}}
                    <button
                        class="w-11 h-11 rounded-2xl bg-white border border-[#E5E7EB] shadow-sm hover:border-[#0B5D4B] hover:shadow-md transition-all duration-300 flex items-center justify-center"
                    >
                        🔍
                    </button>

                    {{-- WISHLIST --}}
                    <a
                        href="{{ route('wishlist') }}"
                        class="w-11 h-11 rounded-2xl bg-white border border-[#E5E7EB] shadow-sm hover:border-[#0B5D4B] hover:shadow-md transition-all duration-300 flex items-center justify-center"
                    >
                        ❤️
                    </a>

                    {{-- CART --}}
                    <a
                        href="{{ route('cart.index') }}"
                        class="relative w-11 h-11 rounded-2xl bg-[#0B5D4B] text-white shadow-lg hover:scale-105 transition-all duration-300 flex items-center justify-center"
                    >
                        🛒

                        @php
                            $cart = session()->get('cart', []);
                        @endphp

                        @if(count($cart) > 0)

                            <span
                                class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-[#D4AF37] text-white text-[10px] flex items-center justify-center"
                            >
                                {{ count($cart) }}
                            </span>

                        @endif

                    </a>

                    {{-- PROFILE --}}
                    @auth

                        <a
                            href="{{ route('profile.dashboard') }}"
                            class="hidden lg:flex items-center gap-3 ml-2"
                        >

                            <div
                                class="w-11 h-11 rounded-2xl border border-[#E5E7EB] bg-white shadow-sm flex items-center justify-center"
                            >
                                👤
                            </div>

                            <div class="text-left">

                                <p class="text-sm font-semibold">
                                    {{ auth()->user()->name }}
                                </p>

                                <p class="text-xs text-gray-500">
                                    Profile
                                </p>

                            </div>

                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="hidden lg:flex h-11 px-6 rounded-2xl bg-[#0B5D4B] text-white font-medium items-center justify-center shadow-lg hover:bg-[#084C3D] transition-all duration-300"
                        >
                            Login
                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </header>

    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <main class="overflow-hidden">

        @yield('content')

    </main>

    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <footer
        class="mt-24 border-t border-[#ECECEC] bg-white"
    >

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

            <div class="grid lg:grid-cols-4 gap-14">

                {{-- BRAND --}}
                <div>

                    <h2
                        class="text-3xl font-bold font-['Playfair_Display']"
                    >
                        Kayla Hijab
                    </h2>

                    <p
                        class="mt-6 text-gray-600 leading-8"
                    >

                        Elegant Muslim fashion designed
                        for confident women who love timeless beauty.

                    </p>

                </div>

                {{-- COMPANY --}}
                <div>

                    <h3
                        class="text-lg font-semibold mb-6"
                    >
                        Company
                    </h3>

                    <div class="space-y-4 text-gray-600">

                        <a
                            href="{{ route('about') }}"
                            class="block hover:text-[#0B5D4B] transition-all duration-300"
                        >
                            About
                        </a>

                        <a
                            href="{{ route('contact') }}"
                            class="block hover:text-[#0B5D4B] transition-all duration-300"
                        >
                            Contact
                        </a>

                        <a
                            href="#"
                            class="block hover:text-[#0B5D4B] transition-all duration-300"
                        >
                            Careers
                        </a>

                    </div>

                </div>

                {{-- COLLECTION --}}
                <div>

                    <h3
                        class="text-lg font-semibold mb-6"
                    >
                        Collections
                    </h3>

                    <div class="space-y-4 text-gray-600">

                        <a
                            href="{{ route('shop') }}"
                            class="block hover:text-[#0B5D4B] transition-all duration-300"
                        >
                            New Arrival
                        </a>

                        <a
                            href="{{ route('shop') }}"
                            class="block hover:text-[#0B5D4B] transition-all duration-300"
                        >
                            Best Seller
                        </a>

                        <a
                            href="{{ route('shop') }}"
                            class="block hover:text-[#0B5D4B] transition-all duration-300"
                        >
                            Premium Collection
                        </a>

                    </div>

                </div>

                {{-- NEWSLETTER --}}
                <div>

                    <h3
                        class="text-lg font-semibold mb-6"
                    >
                        Newsletter
                    </h3>

                    <p
                        class="text-gray-600 leading-8 mb-6"
                    >

                        Receive exclusive collections,
                        styling inspiration, and special offers.

                    </p>

                    <form class="flex gap-3">

                        <input
                            type="email"
                            placeholder="Your email"
                            class="flex-1 h-12 rounded-2xl border border-[#E5E7EB] bg-[#FAF9F6] px-5 outline-none focus:border-[#0B5D4B] transition-all duration-300"
                        >

                        <button
                            class="h-12 px-6 rounded-2xl bg-[#0B5D4B] text-white font-medium shadow-lg hover:bg-[#084C3D] transition-all duration-300"
                        >
                            Join
                        </button>

                    </form>

                </div>

            </div>

            {{-- BOTTOM --}}
            <div
                class="mt-16 pt-8 border-t border-[#ECECEC] flex flex-col lg:flex-row items-center justify-between gap-5"
            >

                <p class="text-sm text-gray-500">

                    © {{ date('Y') }} Kayla Hijab.
                    All rights reserved.

                </p>

                <div class="flex items-center gap-4">

                    <a
                        href="#"
                        class="w-10 h-10 rounded-xl border border-[#ECECEC] flex items-center justify-center hover:bg-[#0B5D4B] hover:text-white transition-all duration-300"
                    >
                        📷
                    </a>

                    <a
                        href="#"
                        class="w-10 h-10 rounded-xl border border-[#ECECEC] flex items-center justify-center hover:bg-[#0B5D4B] hover:text-white transition-all duration-300"
                    >
                        🎵
                    </a>

                    <a
                        href="#"
                        class="w-10 h-10 rounded-xl border border-[#ECECEC] flex items-center justify-center hover:bg-[#0B5D4B] hover:text-white transition-all duration-300"
                    >
                        💬
                    </a>

                </div>

            </div>

        </div>

    </footer>

    @stack('scripts')

</body>

</html>

