@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-[#FAF9F6]">

    <div class="grid lg:grid-cols-2 min-h-screen">

        {{-- LEFT --}}
        <div class="relative hidden lg:block overflow-hidden">

            <img
                src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f"
                class="absolute inset-0 w-full h-full object-cover"
            >

            <div class="absolute inset-0 bg-[#0B5D4B]/70"></div>

            <div class="relative z-10 flex flex-col justify-center h-full px-20 text-white">

                <span
                    class="w-fit px-5 py-2 rounded-full bg-white/10 backdrop-blur border border-white/20 tracking-[3px] text-sm"
                >
                    Welcome Back
                </span>

                <h1 class="mt-8 text-6xl font-bold leading-tight">
                    Sign In to Your Account
                </h1>

                <p class="mt-8 text-xl text-gray-200 leading-relaxed max-w-xl">
                    Continue your premium shopping experience with Kayla Hijab.
                </p>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="flex items-center justify-center px-6 py-20">

            <div
                class="w-full max-w-xl bg-white/80 backdrop-blur-xl rounded-[40px] border border-white shadow-2xl p-12"
            >

                {{-- LOGO --}}
                <div class="text-center">

                    <h2
                        class="text-5xl font-bold text-[#1F2937]"
                    >
                        Kayla Hijab
                    </h2>

                    <p class="mt-4 text-gray-500">
                        Luxury Muslim Fashion
                    </p>

                </div>

                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="mt-12 space-y-7"
                >

                    @csrf

                    {{-- EMAIL --}}
                    <div>

                        <label class="block mb-3 text-sm text-gray-500">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            required
                            class="w-full h-16 rounded-2xl border border-[#E5E7EB] px-6 focus:outline-none focus:border-[#0B5D4B]"
                            placeholder="Enter your email"
                        >

                    </div>

                    {{-- PASSWORD --}}
                    <div>

                        <label class="block mb-3 text-sm text-gray-500">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full h-16 rounded-2xl border border-[#E5E7EB] px-6 focus:outline-none focus:border-[#0B5D4B]"
                            placeholder="Enter your password"
                        >

                    </div>

                    {{-- REMEMBER --}}
                    <div class="flex items-center justify-between">

                        <label class="flex items-center gap-3">

                            <input type="checkbox">

                            <span class="text-gray-600">
                                Remember Me
                            </span>

                        </label>

                        <a
                            href="#"
                            class="text-[#0B5D4B] hover:text-[#D4AF37] transition"
                        >
                            Forgot Password?
                        </a>

                    </div>

                    @if ($errors->any())

    <div class="mb-6 rounded-2xl bg-red-50 border border-red-200 p-5 text-red-600">

        {{ $errors->first() }}

    </div>

@endif

                    {{-- LOGIN BUTTON --}}
                    <button
                        class="w-full h-16 rounded-full bg-[#0B5D4B] hover:bg-[#D4AF37] text-white text-lg transition duration-300 shadow-lg"
                    >
                        Login
                    </button>

                    {{-- GOOGLE --}}
                    <button
                        type="button"
                        class="w-full h-16 rounded-full border border-[#E5E7EB] hover:border-[#0B5D4B] transition"
                    >
                        Continue with Google
                    </button>

                    {{-- APPLE --}}
                    <button
                        type="button"
                        class="w-full h-16 rounded-full border border-[#E5E7EB] hover:border-black transition"
                    >
                        Continue with Apple
                    </button>

                </form>

                {{-- REGISTER --}}
                <div class="mt-10 text-center text-gray-500">

                    Don't have an account?

                    <a
                        href="{{ route('register') }}"
                        class="text-[#0B5D4B] hover:text-[#D4AF37] transition font-medium"
                    >
                        Create Account
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection