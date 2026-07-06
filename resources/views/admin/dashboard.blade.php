

@extends('admin.layouts.app')

@section('content')

<div class="ml-[280px] min-h-screen bg-[#F8F9FA] p-8">

    {{-- WELCOME BANNER --}}
    <div
        class="relative overflow-hidden rounded-[30px] bg-[#083C31] p-10 text-white shadow-2xl"
    >

        <div class="absolute top-0 right-0 w-96 h-96 bg-[#D4AF37]/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 flex items-center justify-between">

            <div>

                <p class="text-sm uppercase tracking-[4px] text-[#D4AF37]">
                    Welcome Back
                </p>

                <h1 class="mt-4 text-5xl font-bold leading-tight">
                    Luxury Fashion Dashboard
                </h1>

                <p class="mt-5 text-white/70 max-w-2xl leading-relaxed">
                    Manage products, orders, customers, and premium collections
                    for Kayla Hijab in one elegant dashboard.
                </p>

                <div class="mt-8 flex gap-4">

                    <button
                        class="h-14 px-8 rounded-2xl bg-[#D4AF37] text-[#083C31] font-semibold hover:scale-105 transition"
                    >
                        Add Product
                    </button>

                    <button
                        class="h-14 px-8 rounded-2xl border border-white/20 hover:bg-white/10 transition"
                    >
                        Generate Report
                    </button>

                </div>

            </div>

            <img
                src="https://images.unsplash.com/photo-1483985988355-763728e1935b"
                class="hidden xl:block w-[420px] rounded-[30px] object-cover shadow-2xl"
            >

        </div>

    </div>

    {{-- STATS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mt-8">

        {{-- REVENUE --}}
        <div class="bg-white rounded-[28px] p-7 shadow-sm border border-[#ECECEC]">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500">
                        Today's Revenue
                    </p>

                    <h2 class="mt-3 text-4xl font-bold text-[#1F2937]">
                        Rp 12.8M
                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-[#0B5D4B]/10 flex items-center justify-center text-3xl">
                    💰
                </div>

            </div>

            <p class="mt-5 text-sm text-green-500">
                +18% from yesterday
            </p>

        </div>

        {{-- ORDERS --}}
        <div class="bg-white rounded-[28px] p-7 shadow-sm border border-[#ECECEC]">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500">
                        Orders
                    </p>

                    <h2 class="mt-3 text-4xl font-bold text-[#1F2937]">
                        184
                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-[#D4AF37]/10 flex items-center justify-center text-3xl">
                    🛒
                </div>

            </div>

            <p class="mt-5 text-sm text-green-500">
                +12 New Orders
            </p>

        </div>

        {{-- CUSTOMERS --}}
        <div class="bg-white rounded-[28px] p-7 shadow-sm border border-[#ECECEC]">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500">
                        Customers
                    </p>

                    <h2 class="mt-3 text-4xl font-bold text-[#1F2937]">
                        2,845
                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">
                    👥
                </div>

            </div>

            <p class="mt-5 text-sm text-green-500">
                +5.4% Growth
            </p>

        </div>

        {{-- PROFIT --}}
        <div class="bg-white rounded-[28px] p-7 shadow-sm border border-[#ECECEC]">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500">
                        Profit
                    </p>

                    <h2 class="mt-3 text-4xl font-bold text-[#1F2937]">
                        Rp 8.2M
                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                    📈
                </div>

            </div>

            <p class="mt-5 text-sm text-green-500">
                +24% This Month
            </p>

        </div>

    </div>

    {{-- CHARTS --}}
    <div class="grid xl:grid-cols-2 gap-6 mt-8">

        {{-- SALES CHART --}}
        <div class="bg-white rounded-[30px] p-8 border border-[#ECECEC] shadow-sm">

            <div class="flex items-center justify-between mb-8">

                <div>

                    <h3 class="text-2xl font-bold text-[#1F2937]">
                        Sales Analytics
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Monthly order performance
                    </p>

                </div>

            </div>

            
::contentReference[oaicite:0]{index=0}


        </div>

        {{-- REVENUE CHART --}}
        <div class="bg-white rounded-[30px] p-8 border border-[#ECECEC] shadow-sm">

            <div class="flex items-center justify-between mb-8">

                <div>

                    <h3 class="text-2xl font-bold text-[#1F2937]">
                        Revenue Sources
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Revenue contribution by category
                    </p>

                </div>

            </div>

            
::contentReference[oaicite:1]{index=1}


        </div>

    </div>

    {{-- TABLES --}}
    <div class="grid xl:grid-cols-3 gap-6 mt-8">

        {{-- RECENT ORDERS --}}
        <div class="xl:col-span-2 bg-white rounded-[30px] p-8 border border-[#ECECEC] shadow-sm">

            <div class="flex items-center justify-between mb-8">

                <h3 class="text-2xl font-bold">
                    Recent Orders
                </h3>

                <button class="text-[#0B5D4B] font-medium">
                    View All
                </button>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="text-left text-gray-500 border-b">

                            <th class="pb-4">Invoice</th>
                            <th class="pb-4">Customer</th>
                            <th class="pb-4">Status</th>
                            <th class="pb-4">Total</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y">

                        <tr class="hover:bg-gray-50 transition">

                            <td class="py-5 font-medium">
                                INV-2026-001
                            </td>

                            <td>Siti Aisyah</td>

                            <td>
                                <span class="px-4 py-2 rounded-full bg-green-100 text-green-600 text-sm">
                                    Completed
                                </span>
                            </td>

                            <td class="font-semibold">
                                Rp 1.250.000
                            </td>

                        </tr>

                        <tr class="hover:bg-gray-50 transition">

                            <td class="py-5 font-medium">
                                INV-2026-002
                            </td>

                            <td>Nabila Putri</td>

                            <td>
                                <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-600 text-sm">
                                    Pending
                                </span>
                            </td>

                            <td class="font-semibold">
                                Rp 850.000
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        {{-- QUICK ACTIONS --}}
        <div class="bg-white rounded-[30px] p-8 border border-[#ECECEC] shadow-sm">

            <h3 class="text-2xl font-bold mb-8">
                Quick Actions
            </h3>

            <div class="space-y-4">

                <button class="w-full h-16 rounded-2xl bg-[#0B5D4B] text-white font-semibold hover:scale-[1.02] transition">
                    + Add Product
                </button>

                <button class="w-full h-16 rounded-2xl bg-[#D4AF37] text-[#083C31] font-semibold hover:scale-[1.02] transition">
                    + Add Category
                </button>

                <button class="w-full h-16 rounded-2xl border border-[#ECECEC] hover:bg-gray-50 transition">
                    Generate Report
                </button>

            </div>

            {{-- LOW STOCK --}}
            <div class="mt-10">

                <h4 class="font-bold text-xl mb-5">
                    Low Stock Alert
                </h4>

                <div class="space-y-4">

                    <div class="flex items-center justify-between bg-red-50 p-4 rounded-2xl">

                        <div>

                            <h5 class="font-semibold">
                                Premium Voal
                            </h5>

                            <p class="text-sm text-gray-500">
                                Only 4 left
                            </p>

                        </div>

                        <span class="text-red-500 font-bold">
                            LOW
                        </span>

                    </div>

                    <div class="flex items-center justify-between bg-yellow-50 p-4 rounded-2xl">

                        <div>

                            <h5 class="font-semibold">
                                Silk Pashmina
                            </h5>

                            <p class="text-sm text-gray-500">
                                Only 7 left
                            </p>

                        </div>

                        <span class="text-yellow-500 font-bold">
                            ALERT
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- BOTTOM --}}
    <div class="grid xl:grid-cols-2 gap-6 mt-8">

        {{-- BEST SELLERS --}}
        <div class="bg-white rounded-[30px] p-8 border border-[#ECECEC] shadow-sm">

            <h3 class="text-2xl font-bold mb-8">
                Best Selling Products
            </h3>

            <div class="space-y-5">

                <div class="flex items-center gap-5">

                    <img
                        src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518"
                        class="w-20 h-20 rounded-2xl object-cover"
                    >

                    <div class="flex-1">

                        <h4 class="font-semibold">
                            Premium Voal Emerald
                        </h4>

                        <p class="text-gray-500 text-sm mt-1">
                            248 Sold
                        </p>

                    </div>

                    <span class="font-bold text-[#0B5D4B]">
                        Rp 329K
                    </span>

                </div>

            </div>

        </div>

        {{-- ACTIVITY --}}
        <div class="bg-white rounded-[30px] p-8 border border-[#ECECEC] shadow-sm">

            <h3 class="text-2xl font-bold mb-8">
                Activity Timeline
            </h3>

            <div class="space-y-6">

                <div class="flex gap-4">

                    <div class="w-4 h-4 rounded-full bg-[#0B5D4B] mt-2"></div>

                    <div>

                        <h4 class="font-semibold">
                            New Product Added
                        </h4>

                        <p class="text-gray-500 text-sm mt-1">
                            Premium Silk Collection uploaded
                        </p>

                    </div>

                </div>

                <div class="flex gap-4">

                    <div class="w-4 h-4 rounded-full bg-[#D4AF37] mt-2"></div>

                    <div>

                        <h4 class="font-semibold">
                            New Order Received
                        </h4>

                        <p class="text-gray-500 text-sm mt-1">
                            Invoice INV-2026-002
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>