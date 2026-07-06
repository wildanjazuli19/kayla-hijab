@extends('layouts.app')

@section('content')

<section class="bg-[#FAF9F6] min-h-screen pt-10 pb-24">

    <div class="max-w-[1700px] mx-auto px-6 lg:px-10">

        {{-- BREADCRUMB --}}
        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500 mb-12">

            <a href="{{ route('home') }}" class="hover:text-[#0B5D4B]">
                Home
            </a>

            <span>/</span>

            <a href="{{ route('shop') }}" class="hover:text-[#0B5D4B]">
                Collection
            </a>

            <span>/</span>

            <span>
                {{ $product->category->name ?? 'Fashion' }}
            </span>

            <span>/</span>

            <span class="text-[#1F2937] font-semibold">
                {{ $product->name }}
            </span>

        </div>

        {{-- PRODUCT --}}
        <div class="grid lg:grid-cols-[55%_45%] gap-20">

            {{-- LEFT --}}
            <div>

                {{-- MAIN IMAGE --}}
                <div class="relative overflow-hidden rounded-[40px] bg-white border border-[#ECECEC] shadow-[0_20px_60px_rgba(0,0,0,0.05)] group">

                    {{-- BADGES --}}
                    <div class="absolute top-6 left-6 z-10 flex flex-wrap gap-3">

                        <span class="px-5 py-2 rounded-full bg-[#0B5D4B] text-white text-xs tracking-[2px] uppercase font-semibold">

                            New Arrival

                        </span>

                        <span class="px-5 py-2 rounded-full bg-[#D4AF37] text-white text-xs tracking-[2px] uppercase font-semibold">

                            Limited Edition

                        </span>

                    </div>

                    <img
                        id="mainImage"
                        src="{{ $product->thumbnail
                            ? asset('storage/' . $product->thumbnail)
                            : 'https://via.placeholder.com/900x1200'
                        }}"
                        class="w-full h-[950px] object-cover group-hover:scale-105 transition duration-700"
                    >

                </div>

                {{-- THUMBNAILS --}}
                <div class="grid grid-cols-5 gap-5 mt-6">

                    @for($i = 0; $i < 5; $i++)

                        <button
                            type="button"
                            class="overflow-hidden rounded-[24px] border border-[#ECECEC] bg-white hover:border-[#0B5D4B] transition"
                        >

                            <img
                                src="{{ $product->thumbnail
                                    ? asset('storage/' . $product->thumbnail)
                                    : 'https://via.placeholder.com/300'
                                }}"
                                class="w-full h-32 object-cover hover:scale-105 transition duration-500"
                            >

                        </button>

                    @endfor

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="pt-4">

                {{-- CATEGORY --}}
                <div class="inline-flex items-center px-5 py-2 rounded-full bg-[#0B5D4B]/10 text-[#0B5D4B] text-sm font-semibold tracking-[2px] uppercase">

                    {{ $product->category->name ?? 'Luxury Fashion' }}

                </div>

                {{-- TITLE --}}
                <h1 class="text-5xl lg:text-7xl font-bold text-[#1F2937] leading-[1.1] mt-8">

                    {{ $product->name }}

                </h1>

                {{-- REVIEW --}}
                <div class="flex items-center gap-5 mt-8">

                    <div class="flex items-center gap-1 text-[#D4AF37] text-xl">

                        ★★★★★

                    </div>

                    <div class="text-gray-500">

                        <span class="font-semibold text-[#1F2937]">
                            4.9
                        </span>

                        (245 Reviews)

                    </div>

                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>

                    <div class="text-gray-500">

                        Sold
                        <span class="font-semibold text-[#1F2937]">
                            1,250+
                        </span>

                    </div>

                </div>

                {{-- PRICE --}}
                <div class="mt-10 flex items-center gap-6 flex-wrap">

                    @if($product->discount_price)

                        <h2
                            id="productPrice"
                            class="text-5xl font-bold text-[#0B5D4B]"
                        >

                            Rp {{ number_format($product->discount_price) }}

                        </h2>

                        <span class="text-3xl text-gray-400 line-through">

                            Rp {{ number_format($product->price) }}

                        </span>

                        <span class="px-4 py-2 rounded-full bg-red-100 text-red-600 text-sm font-semibold">

                            SALE

                        </span>

                    @else

                        <h2
                            id="productPrice"
                            class="text-5xl font-bold text-[#0B5D4B]"
                        >

                            Rp {{ number_format($product->price) }}

                        </h2>

                    @endif

                </div>

                {{-- STOCK --}}
                <div class="mt-6 flex items-center gap-3 text-[#0B5D4B]">

                    <span class="w-3 h-3 rounded-full bg-[#0B5D4B]"></span>

                    Ready Stock

                </div>

                {{-- DESCRIPTION --}}
                <div class="mt-10">

                    <p class="text-lg text-gray-600 leading-[2.1]">

                        {{ $product->description }}

                    </p>

                </div>

                {{-- COLORS --}}
                <div class="mt-14">

                    <h3 class="text-xl font-bold text-[#1F2937] mb-6">

                        Color

                    </h3>

                    <div class="flex items-center gap-5">

                        <button class="w-12 h-12 rounded-full bg-black border-4 border-white shadow-lg"></button>

                        <button class="w-12 h-12 rounded-full bg-[#D4AF37] border-4 border-white shadow-lg"></button>

                        <button class="w-12 h-12 rounded-full bg-[#0B5D4B] border-4 border-white shadow-lg"></button>

                        <button class="w-12 h-12 rounded-full bg-gray-200 border-4 border-white shadow-lg"></button>

                    </div>

                </div>

                {{-- SIZE VARIANT --}}
@if($product->variants && $product->variants->count())

    <div class="mt-14">

        <div class="flex items-center justify-between mb-6">

            <h3 class="text-2xl font-bold text-[#1F2937]">

                Select Size

            </h3>

            <span class="text-sm text-gray-500">
                Choose your preferred fit
            </span>

        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

            @foreach($product->variants as $variant)

                <label
                    class="variant-box relative overflow-hidden rounded-[28px] border border-[#E5E7EB] bg-white cursor-pointer transition-all duration-300 hover:border-[#0B5D4B] hover:shadow-[0_15px_40px_rgba(0,0,0,0.08)] hover:-translate-y-1"
                >

                    <input
                        type="radio"
                        name="variant_id"
                        value="{{ $variant->id }}"
                        data-price="{{ $variant->price }}"
                        class="hidden variant-radio"
                    >

                    <div class="p-6">

                        <div class="flex items-center justify-between">

                            <div class="text-3xl font-bold text-[#1F2937]">

                                {{ $variant->size }}

                            </div>

                            <div class="w-3 h-3 rounded-full bg-[#0B5D4B]"></div>

                        </div>

                        <div class="mt-4">

                            @if($variant->stock > 0)

                                <span class="inline-flex items-center gap-2 text-sm text-[#0B5D4B]">

                                    <span class="w-2 h-2 rounded-full bg-[#0B5D4B]"></span>

                                    Ready Stock

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 text-sm text-red-500">

                                    <span class="w-2 h-2 rounded-full bg-red-500"></span>

                                    Out Of Stock

                                </span>

                            @endif

                        </div>

                        <div class="mt-6">

                            <div class="text-sm text-gray-400 mb-1">

                                Price

                            </div>

                            <div class="text-2xl font-bold text-[#0B5D4B]">

                                Rp {{ number_format($variant->price) }}

                            </div>

                        </div>

                        <div class="mt-5 text-sm text-gray-500">

                            Available:
                            <span class="font-semibold text-[#1F2937]">
                                {{ $variant->stock }}
                            </span>

                        </div>

                    </div>

                    <div class="absolute inset-0 border-2 border-transparent rounded-[28px] pointer-events-none variant-active"></div>

                </label>

            @endforeach

        </div>

    </div>

@endif



{{-- SCRIPT --}}
<script>

    const radios =
        document.querySelectorAll('.variant-radio');

    const selectedVariant =
        document.getElementById('selectedVariant');

    const productPrice =
        document.getElementById('productPrice');

    radios.forEach(radio => {

        radio.addEventListener('change', function () {

            selectedVariant.value =
                this.value;

            const price =
                parseInt(this.dataset.price);

            productPrice.innerHTML =
                'Rp ' + price.toLocaleString('id-ID');

            document.querySelectorAll('.variant-box')
                .forEach(box => {

                    box.classList.remove(
                        'border-[#0B5D4B]',
                        'bg-[#0B5D4B]/5',
                        'shadow-[0_15px_40px_rgba(11,93,75,0.15)]'
                    );

                    box.querySelector('.variant-active')
                        .classList.remove(
                            'border-[#0B5D4B]'
                        );

                });

            this.closest('.variant-box')
                .classList.add(
                    'border-[#0B5D4B]',
                    'bg-[#0B5D4B]/5',
                    'shadow-[0_15px_40px_rgba(11,93,75,0.15)]'
                );

            this.closest('.variant-box')
                .querySelector('.variant-active')
                .classList.add(
                    'border-[#0B5D4B]'
                );

        });

    });

    function increaseQty()
    {
        let qty =
            document.getElementById('quantity');

        qty.value =
            parseInt(qty.value) + 1;
    }

    function decreaseQty()
    {
        let qty =
            document.getElementById('quantity');

        if (qty.value > 1) {

            qty.value =
                parseInt(qty.value) - 1;
        }
    }

</script>
                        {{-- BUTTONS --}}
                        <div class="grid md:grid-cols-2 gap-5">

                            <button
                                type="submit"
                                class="h-16 rounded-2xl bg-[#0B5D4B] text-white text-lg font-semibold hover:bg-[#083C31] transition-all duration-300 shadow-[0_15px_40px_rgba(11,93,75,0.3)]"
                            >

                                Add To Cart

                            </button>

                            <button
                                type="button"
                                class="h-16 rounded-2xl border border-[#0B5D4B] text-[#0B5D4B] text-lg font-semibold hover:bg-[#0B5D4B] hover:text-white transition-all duration-300"
                            >

                                Buy Now

                            </button>

                        </div>

                    </div>

                </form>

                {{-- TRUST --}}
                <div class="grid md:grid-cols-2 gap-5 mt-16">

                    <div class="bg-white rounded-[28px] border border-[#ECECEC] p-6">
                        🔒 Secure Payment
                    </div>

                    <div class="bg-white rounded-[28px] border border-[#ECECEC] p-6">
                        🎁 Premium Packaging
                    </div>

                    <div class="bg-white rounded-[28px] border border-[#ECECEC] p-6">
                        🚚 Free Shipping
                    </div>

                    <div class="bg-white rounded-[28px] border border-[#ECECEC] p-6">
                        ↩ Easy Returns
                    </div>

                </div>

            </div>

        </div>

        {{-- ACCORDION --}}
        <div class="mt-32 space-y-6">

            <div class="bg-white rounded-[30px] border border-[#ECECEC] overflow-hidden">

                <button class="w-full flex items-center justify-between p-8 text-left">

                    <span class="text-2xl font-bold text-[#1F2937]">

                        Product Description

                    </span>

                    <span class="text-3xl">
                        +
                    </span>

                </button>

            </div>

            <div class="bg-white rounded-[30px] border border-[#ECECEC] overflow-hidden">

                <button class="w-full flex items-center justify-between p-8 text-left">

                    <span class="text-2xl font-bold text-[#1F2937]">

                        Material & Care

                    </span>

                    <span class="text-3xl">
                        +
                    </span>

                </button>

            </div>

            <div class="bg-white rounded-[30px] border border-[#ECECEC] overflow-hidden">

                <button class="w-full flex items-center justify-between p-8 text-left">

                    <span class="text-2xl font-bold text-[#1F2937]">

                        Shipping & Returns

                    </span>

                    <span class="text-3xl">
                        +
                    </span>

                </button>

            </div>

        </div>

    </div>

</section>

{{-- SCRIPT --}}
<script>

    const radios =
        document.querySelectorAll('.variant-radio');

    const selectedVariant =
        document.getElementById('selectedVariant');

    const productPrice =
        document.getElementById('productPrice');

    radios.forEach(radio => {

        radio.addEventListener('change', function () {

            selectedVariant.value =
                this.value;

            const price =
                parseInt(this.dataset.price);

            productPrice.innerHTML =
                'Rp ' + price.toLocaleString('id-ID');

            document.querySelectorAll('.variant-box')
                .forEach(box => {

                    box.classList.remove(
                        'border-[#0B5D4B]',
                        'bg-[#0B5D4B]/5'
                    );

                });

            this.closest('.variant-box')
                .classList.add(
                    'border-[#0B5D4B]',
                    'bg-[#0B5D4B]/5'
                );

        });

    });

    function increaseQty()
    {
        let qty =
            document.getElementById('quantity');

        qty.value =
            parseInt(qty.value) + 1;
    }

    function decreaseQty()
    {
        let qty =
            document.getElementById('quantity');

        if (qty.value > 1) {

            qty.value =
                parseInt(qty.value) - 1;
        }
    }

</script>

@endsection