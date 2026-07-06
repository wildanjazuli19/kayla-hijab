@extends('admin.layouts.app')

@section('content')

<div class="max-w-[1600px] mx-auto pb-40">

    {{-- HEADER --}}
    <div class="mb-10">

        <p class="text-sm tracking-[5px] uppercase text-[#D4AF37] font-medium">
            Kayla Hijab Admin
        </p>

        <div class="flex items-center justify-between mt-4">

            <div>

                <h1 class="text-5xl font-bold text-[#1F2937]">
                    Create Category
                </h1>

                <p class="mt-3 text-gray-500 text-lg">
                    Add premium product category
                </p>

            </div>

            <a
                href="{{ route('admin.categories') }}"
                class="h-14 px-8 rounded-2xl border border-[#E5E7EB] bg-white flex items-center hover:shadow-lg transition"
            >
                Back
            </a>

        </div>

    </div>

    {{-- ERROR --}}
    @if ($errors->any())

        <div class="mb-8 bg-red-50 border border-red-200 rounded-3xl p-6">

            <ul class="space-y-2 text-red-600">

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
        action="{{ route('admin.categories.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="grid grid-cols-1 2xl:grid-cols-12 gap-8">

            {{-- LEFT --}}
            <div class="2xl:col-span-8 space-y-8">

                {{-- GENERAL --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] shadow-sm p-10">

                    <div class="mb-10">

                        <h2 class="text-3xl font-bold text-[#1F2937]">
                            General Information
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Category information
                        </p>

                    </div>

                    <div class="space-y-7">

                        {{-- CATEGORY NAME --}}
                        <div>

                            <label class="block text-sm font-semibold mb-3">
                                Category Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Hijab Voal"
                                class="w-full h-16 rounded-2xl border border-[#E5E7EB] px-6 bg-[#FAF9F6] focus:outline-none focus:border-[#0B5D4B]"
                            >

                        </div>

                        {{-- SLUG --}}
                        <div>

                            <label class="block text-sm font-semibold mb-3">
                                Slug
                            </label>

                            <input
                                type="text"
                                name="slug"
                                value="{{ old('slug') }}"
                                placeholder="hijab-voal"
                                class="w-full h-16 rounded-2xl border border-[#E5E7EB] px-6 bg-[#FAF9F6]"
                            >

                        </div>

                        {{-- DESCRIPTION --}}
                        <div>

                            <label class="block text-sm font-semibold mb-3">
                                Description
                            </label>

                            <textarea
                                name="description"
                                rows="7"
                                placeholder="Write category description..."
                                class="w-full rounded-3xl border border-[#E5E7EB] p-6 bg-[#FAF9F6] resize-none"
                            >{{ old('description') }}</textarea>

                        </div>

                    </div>

                </div>

                {{-- SEO --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] shadow-sm p-10">

                    <div class="mb-10">

                        <h2 class="text-3xl font-bold">
                            SEO Settings
                        </h2>

                    </div>

                    <div class="space-y-6">

                        {{-- SEO TITLE --}}
                        <div>

                            <label class="block text-sm font-semibold mb-3">
                                SEO Title
                            </label>

                            <input
                                type="text"
                                name="seo_title"
                                placeholder="Premium Hijab Voal"
                                class="w-full h-16 rounded-2xl border border-[#E5E7EB] px-6 bg-[#FAF9F6]"
                            >

                        </div>

                        {{-- SEO DESCRIPTION --}}
                        <div>

                            <label class="block text-sm font-semibold mb-3">
                                SEO Description
                            </label>

                            <textarea
                                name="seo_description"
                                rows="5"
                                placeholder="SEO description..."
                                class="w-full rounded-3xl border border-[#E5E7EB] p-6 bg-[#FAF9F6]"
                            ></textarea>

                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="2xl:col-span-4 space-y-8">

                {{-- CATEGORY IMAGE --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] shadow-sm p-10">

                    <div class="mb-8">

                        <h2 class="text-3xl font-bold">
                            Category Image
                        </h2>

                    </div>

                    <div
                        class="border-2 border-dashed border-[#D4AF37] rounded-[30px] bg-[#FAF9F6] p-10 text-center"
                    >

                        <div class="text-6xl mb-5">
                            🖼️
                        </div>

                        <h3 class="text-xl font-semibold">
                            Upload Image
                        </h3>

                        <p class="mt-2 text-gray-500">
                            PNG or JPG max 5MB
                        </p>

                        <input
                            type="file"
                            name="image"
                            class="mt-8 block w-full text-sm"
                        >

                    </div>

                </div>

                {{-- SETTINGS --}}
                <div class="bg-white rounded-[30px] border border-[#ECECEC] shadow-sm p-10">

                    <div class="mb-8">

                        <h2 class="text-3xl font-bold">
                            Settings
                        </h2>

                    </div>

                    <div class="space-y-6">

                        {{-- DISPLAY ORDER --}}
                        <div>

                            <label class="block text-sm font-semibold mb-3">
                                Display Order
                            </label>

                            <input
                                type="number"
                                name="display_order"
                                value="0"
                                class="w-full h-16 rounded-2xl border border-[#E5E7EB] px-6 bg-[#FAF9F6]"
                            >

                        </div>

                        {{-- FEATURED --}}
                        <label class="flex items-center justify-between">

                            <span class="font-medium">
                                Featured Category
                            </span>

                            <input
                                type="checkbox"
                                name="featured"
                                value="1"
                                class="w-5 h-5"
                            >

                        </label>

                        {{-- STATUS --}}
                        <label class="flex items-center justify-between">

                            <span class="font-medium">
                                Active Status
                            </span>

                            <input
                                type="checkbox"
                                name="status"
                                value="1"
                                checked
                                class="w-5 h-5"
                            >

                        </label>

                    </div>

                </div>

            </div>

        </div>

        {{-- STICKY ACTION --}}
        <div
            class="fixed bottom-0 left-[280px] right-0 bg-white border-t border-[#ECECEC] px-10 py-5 flex items-center justify-end gap-5 z-50"
        >

            <a
                href="{{ route('admin.categories') }}"
                class="h-14 px-8 rounded-2xl border border-[#E5E7EB] flex items-center bg-white hover:shadow-md transition"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="h-14 px-10 rounded-2xl bg-[#0B5D4B] text-white hover:bg-[#083C31] transition shadow-lg"
            >
                Save Category
            </button>

        </div>

    </form>

</div>

@endsection