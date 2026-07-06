@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-[#FAF9F6] overflow-hidden">

    <div class="grid lg:grid-cols-2 min-h-screen">

        {{-- ================= LEFT SIDE ================= --}}
        <div class="relative hidden lg:block">

            <img
                src="https://images.unsplash.com/photo-1483985988355-763728e1935b"
                class="absolute inset-0 w-full h-full object-cover"
            >

            <div class="absolute inset-0 bg-[#0B5D4B]/75"></div>

            <div class="relative z-10 flex flex-col justify-center h-full px-20 text-white">

                <span class="mb-6 inline-flex w-fit rounded-full border border-white/20 bg-white/10 px-5 py-2 text-sm backdrop-blur-xl">
                    Join Kayla Hijab
                </span>

                <h1 class="text-6xl font-bold leading-tight">
                    Create Your Account
                </h1>

                <p class="mt-8 max-w-xl text-xl leading-relaxed text-gray-200">
                    Join thousands of women discovering premium hijab collections crafted for elegance and modern Muslim fashion.
                </p>

            </div>

        </div>

        {{-- ================= RIGHT SIDE ================= --}}
        <div class="flex items-center justify-center px-6 py-20">

            <div
                class="w-full max-w-2xl rounded-[40px] border border-white bg-white/80 p-12 shadow-2xl backdrop-blur-xl"
            >

                {{-- TITLE --}}
                <div class="mb-10">

                    <h2 class="text-5xl font-bold text-[#1F2937]">
                        Register
                    </h2>

                    <p class="mt-4 text-gray-500">
                        Create your premium Kayla Hijab account.
                    </p>

                </div>

                {{-- ERROR MESSAGE --}}
                @if ($errors->any())

                    <div class="mb-8 rounded-3xl border border-red-200 bg-red-50 p-6">

                        <ul class="space-y-2 text-sm text-red-600">

                            @foreach ($errors->all() as $error)

                                <li>
                                    • {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('register') }}"
                    class="grid md:grid-cols-2 gap-6"
                >

                    @csrf

                    {{-- FULL NAME --}}
                    <div class="md:col-span-2">

                        <label class="mb-3 block text-sm font-medium text-gray-600">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter your full name"
                            class="h-16 w-full rounded-2xl border border-[#E5E7EB] bg-white px-6 outline-none transition focus:border-[#0B5D4B]"
                        >

                    </div>

                    {{-- USERNAME --}}
                    <div>

                        <label class="mb-3 block text-sm font-medium text-gray-600">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="Username"
                            class="h-16 w-full rounded-2xl border border-[#E5E7EB] bg-white px-6 outline-none transition focus:border-[#0B5D4B]"
                        >

                    </div>

                    {{-- PHONE --}}
                    <div>

                        <label class="mb-3 block text-sm font-medium text-gray-600">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="08xxxxxxxxxx"
                            class="h-16 w-full rounded-2xl border border-[#E5E7EB] bg-white px-6 outline-none transition focus:border-[#0B5D4B]"
                        >

                    </div>

                    {{-- EMAIL --}}
                    <div class="md:col-span-2">

                        <label class="mb-3 block text-sm font-medium text-gray-600">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="example@email.com"
                            class="h-16 w-full rounded-2xl border border-[#E5E7EB] bg-white px-6 outline-none transition focus:border-[#0B5D4B]"
                        >

                    </div>

                    {{-- PASSWORD --}}
                    <div>

                        <label class="mb-3 block text-sm font-medium text-gray-600">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Enter password"
                            class="h-16 w-full rounded-2xl border border-[#E5E7EB] bg-white px-6 outline-none transition focus:border-[#0B5D4B]"
                        >

                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div>

                        <label class="mb-3 block text-sm font-medium text-gray-600">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm password"
                            class="h-16 w-full rounded-2xl border border-[#E5E7EB] bg-white px-6 outline-none transition focus:border-[#0B5D4B]"
                        >

                    </div>

                    {{-- CHECKBOX --}}
                    <div class="md:col-span-2 mt-2 space-y-4">

                        <label class="flex items-center gap-3">

                            <input
                                type="checkbox"
                                class="h-5 w-5 rounded border-gray-300 text-[#0B5D4B]"
                            >

                            <span class="text-sm text-gray-600">
                                I agree to the Terms & Conditions
                            </span>

                        </label>

                        <label class="flex items-center gap-3">

                            <input
                                type="checkbox"
                                class="h-5 w-5 rounded border-gray-300 text-[#0B5D4B]"
                            >

                            <span class="text-sm text-gray-600">
                                Subscribe to premium newsletter
                            </span>

                        </label>

                    </div>

                    {{-- BUTTON --}}
                    <div class="md:col-span-2 mt-4">

                        <button
                            type="submit"
                            class="h-16 w-full rounded-full bg-[#0B5D4B] text-lg font-medium text-white transition duration-300 hover:bg-[#D4AF37]"
                        >
                            Create Account
                        </button>

                    </div>

                </form>

                {{-- LOGIN --}}
                <div class="mt-10 text-center text-gray-500">

                    Already have an account?

                    <a
                        href="{{ route('login') }}"
                        class="font-medium text-[#0B5D4B] transition hover:text-[#D4AF37]"
                    >
                        Login
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection