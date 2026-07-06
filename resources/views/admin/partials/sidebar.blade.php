{{-- ================= SIDEBAR ================= --}}
<aside
    x-data="{ open: true }"
    :class="open ? 'w-[280px]' : 'w-[95px]'"
    class="fixed top-0 left-0 h-screen bg-[#083C31] text-white transition-all duration-300 z-50 shadow-2xl flex flex-col"
>

    {{-- LOGO --}}
    <div class="h-24 flex items-center justify-between px-6 border-b border-white/10">

        <div class="flex items-center gap-4">

            <img
                src="{{ asset('images/logo.png') }}"
                class="w-12 h-12 object-contain"
            >

            <div x-show="open">

                <h1 class="text-2xl font-bold tracking-wide">
                    Kayla Hijab
                </h1>

                <p class="text-xs text-white/60 mt-1">
                    Luxury Admin
                </p>

            </div>

        </div>

        {{-- TOGGLE --}}
        <button
            @click="open = !open"
            class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition flex items-center justify-center"
        >
            ☰
        </button>

    </div>

    {{-- MENU --}}
    <div class="flex-1 overflow-y-auto px-4 py-8 space-y-2">

        {{-- DASHBOARD --}}
        <a
            href="/admin"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl bg-[#D4AF37] text-[#083C31] font-semibold shadow-lg"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-6 h-6"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7m-9 9V9m0 0L5 14m7-5l7 5" />
            </svg>

            <span x-show="open">Dashboard</span>
        </a>

        {{-- PRODUCTS --}}
        <a
            href="/admin/products"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition duration-300"
        >
            📦

            <span x-show="open">Products</span>
        </a>

        {{-- CATEGORIES --}}
        <a
            href="/admin/categories"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition duration-300"
        >
            🏷️

            <span x-show="open">Categories</span>
        </a>

        {{-- ORDERS --}}
        <a
            href="/admin/orders"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition duration-300"
        >
            🛒

            <span x-show="open">Orders</span>
        </a>

        {{-- CUSTOMERS --}}
        <a
            href="/admin/customers"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition duration-300"
        >
            👥

            <span x-show="open">Customers</span>
        </a>

        {{-- INVENTORY --}}
        <a
            href="/admin/inventory"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition duration-300"
        >
            📊

            <span x-show="open">Inventory</span>
        </a>

        {{-- REPORTS --}}
        <a
            href="/admin/reports"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition duration-300"
        >
            📈

            <span x-show="open">Reports</span>
        </a>

        {{-- SETTINGS --}}
        <a
            href="/admin/settings"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition duration-300"
        >
            ⚙️

            <span x-show="open">Settings</span>
        </a>

    </div>

    {{-- PROFILE CARD --}}
    <div class="p-4 border-t border-white/10">

        <div
            class="bg-white/10 rounded-3xl p-4 flex items-center gap-4 backdrop-blur-xl"
        >

            <img
                src="https://i.pravatar.cc/100"
                class="w-14 h-14 rounded-2xl object-cover border-2 border-[#D4AF37]"
            >

            <div x-show="open" class="flex-1">

                <h3 class="font-semibold">
                    Admin Kayla
                </h3>

                <p class="text-sm text-white/60">
                    Super Admin
                </p>

            </div>

        </div>

        {{-- LOGOUT --}}
        <a
            href="/logout"
            class="mt-4 flex items-center justify-center gap-3 w-full h-14 rounded-2xl bg-red-500 hover:bg-red-600 transition font-medium"
        >
            🚪

            <span x-show="open">
                Logout
            </span>
        </a>

    </div>

</aside>

{{-- MOBILE OVERLAY --}}
<div
    x-show="open"
    class="fixed inset-0 bg-black/40 z-40 lg:hidden"
></div>