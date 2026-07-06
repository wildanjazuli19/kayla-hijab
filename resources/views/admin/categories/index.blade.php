@extends('admin.layouts.app')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

        <div>

            <h1 class="text-4xl font-bold text-[#1F2937]">
                Categories
            </h1>

            <p class="text-gray-500 mt-2 text-lg">
                Manage luxury product categories
            </p>

        </div>

        <a
            href="{{ route('admin.categories.create') }}"
            class="h-14 px-8 rounded-2xl bg-[#0B5D4B] hover:bg-[#094537] transition text-white flex items-center justify-center font-semibold shadow-lg"
        >
            + Add Category
        </a>

    </div>

    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="p-5 rounded-3xl bg-green-100 border border-green-200 text-green-700">

            {{ session('success') }}

        </div>

    @endif

    {{-- STATS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white rounded-[30px] border border-[#ECECEC] p-8 shadow-sm">

            <p class="text-gray-500">
                Total Categories
            </p>

            <h2 class="text-4xl font-bold mt-3 text-[#1F2937]">

                {{ $categories->count() }}

            </h2>

        </div>

        <div class="bg-white rounded-[30px] border border-[#ECECEC] p-8 shadow-sm">

            <p class="text-gray-500">
                Active Categories
            </p>

            <h2 class="text-4xl font-bold mt-3 text-green-600">

                {{ $categories->where('status', 1)->count() }}

            </h2>

        </div>

        <div class="bg-white rounded-[30px] border border-[#ECECEC] p-8 shadow-sm">

            <p class="text-gray-500">
                Featured Categories
            </p>

            <h2 class="text-4xl font-bold mt-3 text-[#D4AF37]">

                {{ $categories->where('featured', 1)->count() }}

            </h2>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-[30px] border border-[#ECECEC] overflow-hidden shadow-sm">

        <div class="p-8 border-b border-[#ECECEC] flex flex-col lg:flex-row gap-4 lg:items-center lg:justify-between">

            <div>

                <h2 class="text-2xl font-bold text-[#1F2937]">
                    Category List
                </h2>

                <p class="text-gray-500 mt-1">
                    Luxury category management
                </p>

            </div>

            <div class="flex items-center gap-4">

                <input
                    type="text"
                    placeholder="Search category..."
                    class="h-12 w-72 rounded-2xl border border-[#E5E7EB] px-5 focus:outline-none focus:ring-2 focus:ring-[#0B5D4B]"
                >

            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-[#FAF9F6]">

                    <tr>

                        <th class="p-6 text-left text-sm font-semibold text-gray-500">
                            Image
                        </th>

                        <th class="p-6 text-left text-sm font-semibold text-gray-500">
                            Category
                        </th>

                        <th class="p-6 text-left text-sm font-semibold text-gray-500">
                            Description
                        </th>

                        <th class="p-6 text-left text-sm font-semibold text-gray-500">
                            Featured
                        </th>

                        <th class="p-6 text-left text-sm font-semibold text-gray-500">
                            Status
                        </th>

                        <th class="p-6 text-left text-sm font-semibold text-gray-500">
                            Created
                        </th>

                        <th class="p-6 text-center text-sm font-semibold text-gray-500">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                        <tr class="border-t border-[#ECECEC] hover:bg-[#FAF9F6] transition">

                            {{-- IMAGE --}}
                            <td class="p-6">

                                @if($category->image)

                                    <img
                                        src="{{ asset('storage/' . $category->image) }}"
                                        class="w-20 h-20 rounded-2xl object-cover border border-[#ECECEC]"
                                    >

                                @else

                                    <div class="w-20 h-20 rounded-2xl bg-gray-100 flex items-center justify-center text-gray-400">
                                        No Image
                                    </div>

                                @endif

                            </td>

                            {{-- CATEGORY --}}
                            <td class="p-6">

                                <div>

                                    <h3 class="font-bold text-lg text-[#1F2937]">

                                        {{ $category->name }}

                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">

                                        {{ $category->slug }}

                                    </p>

                                </div>

                            </td>

                            {{-- DESCRIPTION --}}
                            <td class="p-6">

                                <p class="text-gray-600 line-clamp-2 max-w-xs">

                                    {{ $category->description }}

                                </p>

                            </td>

                            {{-- FEATURED --}}
                            <td class="p-6">

                                @if($category->featured)

                                    <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm font-medium">

                                        Featured

                                    </span>

                                @else

                                    <span class="text-gray-400">
                                        —
                                    </span>

                                @endif

                            </td>

                            {{-- STATUS --}}
                            <td class="p-6">

                                @if($category->status)

                                    <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-medium">

                                        Active

                                    </span>

                                @else

                                    <span class="px-4 py-2 rounded-full bg-red-100 text-red-600 text-sm font-medium">

                                        Inactive

                                    </span>

                                @endif

                            </td>

                            {{-- CREATED --}}
                            <td class="p-6 text-gray-500">

                                {{ $category->created_at->format('d M Y') }}

                            </td>

                            {{-- ACTIONS --}}
                            <td class="p-6">

                                <div class="flex items-center justify-center gap-3">

                                    <a
                                        href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="h-11 px-5 rounded-2xl bg-[#0B5D4B] hover:bg-[#094537] transition text-white flex items-center"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.categories.destroy', $category->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Delete this category?')"
                                            class="h-11 px-5 rounded-2xl bg-red-500 hover:bg-red-600 transition text-white"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="p-16 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="w-24 h-24 rounded-full bg-[#FAF9F6] flex items-center justify-center text-4xl">

                                        📦

                                    </div>

                                    <h3 class="text-2xl font-bold mt-6 text-[#1F2937]">

                                        No Categories Found

                                    </h3>

                                    <p class="text-gray-500 mt-2">

                                        Start by creating your first category

                                    </p>

                                    <a
                                        href="{{ route('admin.categories.create') }}"
                                        class="mt-6 h-12 px-6 rounded-2xl bg-[#0B5D4B] text-white flex items-center"
                                    >
                                        + Add Category
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection