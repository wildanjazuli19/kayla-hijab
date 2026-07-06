@extends('admin.layouts.app')

@section('content')

<div class="flex items-center justify-between mb-10">


<div>

    <h1 class="text-4xl font-bold text-[#1F2937]">
        Categories
    </h1>

    <p class="text-gray-500 mt-2">
        Manage all product categories
    </p>

</div>

<a
    href="{{ route('admin.categories.create') }}"
    class="h-14 px-8 rounded-2xl bg-[#0B5D4B] hover:bg-[#083C31] text-white flex items-center transition duration-300 shadow-lg"
>
    + Add Category
</a>


</div>

@if(session('success'))

<div class="mb-8 p-5 rounded-2xl bg-green-100 text-green-700 border border-green-200">

    {{ session('success') }}

</div>


@endif

<div class="bg-white rounded-[30px] border border-[#ECECEC] overflow-hidden shadow-sm">


<div class="overflow-x-auto">

    <table class="w-full">

        <thead class="bg-[#FAF9F6] border-b border-[#ECECEC]">

            <tr>

                <th class="p-6 text-left text-sm font-semibold text-gray-600">
                    Category
                </th>

                <th class="p-6 text-left text-sm font-semibold text-gray-600">
                    Slug
                </th>

                <th class="p-6 text-left text-sm font-semibold text-gray-600">
                    Status
                </th>

                <th class="p-6 text-left text-sm font-semibold text-gray-600">
                    Featured
                </th>

                <th class="p-6 text-left text-sm font-semibold text-gray-600">
                    Created
                </th>

                <th class="p-6 text-center text-sm font-semibold text-gray-600">
                    Actions
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($categories as $category)

                <tr class="border-b border-[#F3F4F6] hover:bg-[#FAF9F6] transition duration-200">

                    <td class="p-6">

                        <div class="flex items-center gap-5">

                            <div class="w-20 h-20 rounded-2xl overflow-hidden bg-gray-100 flex-shrink-0">

                                <img
                                    src="{{ $category->image
                                        ? asset('storage/' . $category->image)
                                        : 'https://via.placeholder.com/300x300?text=Category'
                                    }}"
                                    alt="{{ $category->name }}"
                                    class="w-full h-full object-cover"
                                >

                            </div>

                            <div>

                                <h3 class="font-semibold text-[#1F2937] text-lg">
                                    {{ $category->name }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $category->description ?? 'No description' }}
                                </p>

                            </div>

                        </div>

                    </td>

                    <td class="p-6 text-gray-600">

                        {{ $category->slug }}

                    </td>

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

                    <td class="p-6">

                        @if($category->featured)

                            <span class="px-4 py-2 rounded-full bg-[#D4AF37]/20 text-[#B68B00] text-sm font-medium">
                                Featured
                            </span>

                        @else

                            <span class="text-gray-400 text-sm">
                                —
                            </span>

                        @endif

                    </td>

                    <td class="p-6 text-gray-500">

                        {{ $category->created_at->format('d M Y') }}

                    </td>

                    <td class="p-6">

                        <div class="flex items-center justify-center gap-3">

                            <a
                                href="{{ route('admin.categories.edit', $category->id) }}"
                                class="h-11 px-5 rounded-xl bg-[#0B5D4B] hover:bg-[#083C31] text-white flex items-center transition duration-300"
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
                                    class="h-11 px-5 rounded-xl bg-red-500 hover:bg-red-600 text-white transition duration-300"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="py-24 text-center">

                        <div class="flex flex-col items-center">

                            <div class="w-24 h-24 rounded-full bg-[#FAF9F6] flex items-center justify-center mb-6">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 text-gray-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M3 7l9-4 9 4m-9 13V10m0 10l-9-4m9 4l9-4" />

                                </svg>

                            </div>

                            <h3 class="text-2xl font-semibold text-[#1F2937]">
                                No Categories Found
                            </h3>

                            <p class="text-gray-500 mt-3">
                                Start creating your luxury category collection.
                            </p>

                            <a
                                href="{{ route('admin.categories.create') }}"
                                class="mt-8 h-14 px-8 rounded-2xl bg-[#0B5D4B] text-white flex items-center"
                            >
                                + Create Category
                            </a>

                        </div>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


</div>

@endsection
