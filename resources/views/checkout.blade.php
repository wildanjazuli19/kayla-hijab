{{-- ===================================================== --}}
{{-- KAYLA HIJAB PREMIUM CHECKOUT --}}
{{-- Production Ready Checkout --}}
{{-- ===================================================== --}}

@extends('layouts.app')

@section('content')

<section class="bg-[#FAF9F6] min-h-screen flex flex-col">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        {{-- ===================================================== --}}
        {{-- STEPS --}}
        {{-- ===================================================== --}}

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-12">

            @php
                $steps = [
                    ['step' => 'Step 1', 'title' => 'Shipping Address', 'active' => true],
                    ['step' => 'Step 2', 'title' => 'Shipping Method', 'active' => false],
                    ['step' => 'Step 3', 'title' => 'Payment Method', 'active' => false],
                    ['step' => 'Step 4', 'title' => 'Review Order', 'active' => false],
                ];
            @endphp

            @foreach($steps as $item)

                <div class="rounded-[30px] p-6 transition-all duration-300
                    {{ $item['active']
                        ? 'bg-[#0B5D4B] text-white shadow-xl'
                        : 'bg-white border border-[#ECECEC] text-[#1F2937]'
                    }}"
                >

                    <div class="uppercase tracking-[3px] text-xs opacity-70">
                        {{ $item['step'] }}
                    </div>

                    <h3 class="text-2xl font-bold mt-3">
                        {{ $item['title'] }}
                    </h3>

                </div>

            @endforeach

        </div>

       <form action="" method="POST" id="checkoutForm">
            @csrf

            <div class="grid lg:grid-cols-[65%_35%] gap-10">

                {{-- ===================================================== --}}
                {{-- LEFT --}}
                {{-- ===================================================== --}}

                <div class="space-y-10">

                    {{-- ===================================================== --}}
                    {{-- SHIPPING ADDRESS --}}
                    {{-- ===================================================== --}}

                    <div class="bg-white rounded-[32px] border border-[#ECECEC] shadow-sm p-8">

                        <div class="flex items-center justify-between mb-8">

                            <div>

                                <h2 class="text-4xl font-bold text-[#1F2937]">
                                    Shipping Address
                                </h2>

                                <p class="text-gray-500 mt-2">
                                    Complete your delivery details
                                </p>

                            </div>

                            <button
                                type="button"
                                id="locateMe"
                                class="h-14 px-6 rounded-2xl bg-[#0B5D4B]/10 text-[#0B5D4B] font-semibold hover:bg-[#0B5D4B] hover:text-white transition-all duration-300"
                            >
                                📍 Locate Me
                            </button>

                        </div>

                        {{-- FORM --}}
                        <div class="grid md:grid-cols-2 gap-6">

                            <div>

                                <label class="block text-sm font-semibold mb-3">
                                    Recipient Name
                                </label>

                                <input
                                    type="text"
                                    name="recipient_name"
                                    id="recipientName"
                                    class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5 focus:outline-none focus:border-[#0B5D4B]"
                                    placeholder="Full Name"
                                    required
                                >

                            </div>

                            <div>

                                <label class="block text-sm font-semibold mb-3">
                                    Phone Number
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    id="phoneNumber"
                                    class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5 focus:outline-none focus:border-[#0B5D4B]"
                                    placeholder="08xxxxxxxx"
                                    required
                                >

                            </div>

                        </div>

                        {{-- SEARCH --}}
                        <div class="mt-8">

                            <label class="block text-sm font-semibold mb-3">
                                Search Address
                            </label>

                            <input
                                type="text"
                                id="searchLocation"
                                class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                                placeholder="Search location..."
                            >

                        </div>

                        {{-- MAP --}}
                        <div
                            id="map"
                            class="h-[500px] rounded-[32px] overflow-hidden border border-[#ECECEC] mt-8"
                        ></div>

                        {{-- ADDRESS --}}
                        <div class="grid md:grid-cols-2 gap-6 mt-8">

                            <div class="md:col-span-2">

                                <label class="block text-sm font-semibold mb-3">
                                    Street Address
                                </label>

                                <textarea
                                    name="street_address"
                                    id="streetAddress"
                                    rows="4"
                                    class="w-full rounded-2xl border border-[#E5E7EB] p-5"
                                    required
                                ></textarea>

                            </div>

                            <div>

                                <label class="block text-sm font-semibold mb-3">
                                    Province
                                </label>

                                <input
                                    type="text"
                                    name="province"
                                    id="province"
                                    class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                                    required
                                >

                            </div>

                            <div>

                                <label class="block text-sm font-semibold mb-3">
                                    City
                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    id="city"
                                    class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                                    required
                                >

                            </div>

                            <div>

                                <label class="block text-sm font-semibold mb-3">
                                    District
                                </label>

                                <input
                                    type="text"
                                    name="district"
                                    id="district"
                                    class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                                >

                            </div>

                            <div>

                                <label class="block text-sm font-semibold mb-3">
                                    Postal Code
                                </label>

                                <input
                                    type="text"
                                    name="postal_code"
                                    id="postalCode"
                                    class="w-full h-14 rounded-2xl border border-[#E5E7EB] px-5"
                                >

                            </div>

                        </div>

                        {{-- HIDDEN --}}
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">

                    </div>

                    {{-- ===================================================== --}}
                    {{-- SHIPPING --}}
                    {{-- ===================================================== --}}

                    <div class="bg-white rounded-[32px] border border-[#ECECEC] shadow-sm p-8">

                        <div class="flex items-center justify-between mb-8">

                            <h2 class="text-4xl font-bold text-[#1F2937]">
                                Shipping Method
                            </h2>

                            <div
                                id="shippingLoading"
                                class="hidden text-[#0B5D4B] font-semibold"
                            >
                                Calculating...
                            </div>

                        </div>

                        <div class="space-y-5">

                            @php

                                $shippingMethods = [

                                    [
                                        'courier' => 'JNE',
                                        'service' => 'REG',
                                        'estimate' => '2-3 Days',
                                        'cost' => 18000,
                                    ],

                                    [
                                        'courier' => 'JNE',
                                        'service' => 'YES',
                                        'estimate' => '1 Day',
                                        'cost' => 32000,
                                    ],

                                    [
                                        'courier' => 'SiCepat',
                                        'service' => 'BEST',
                                        'estimate' => '1 Day',
                                        'cost' => 28000,
                                    ],

                                    [
                                        'courier' => 'J&T Express',
                                        'service' => 'EZ',
                                        'estimate' => '2 Days',
                                        'cost' => 22000,
                                    ],

                                ];

                            @endphp

                            @foreach($shippingMethods as $shipping)

                                <label class="shippingCard block cursor-pointer">

                                    <input
                                        type="radio"
                                        name="shipping_method"
                                        class="hidden shippingRadio"
                                        value="{{ $shipping['courier'] }}"
                                        data-cost="{{ $shipping['cost'] }}"
                                        data-estimate="{{ $shipping['estimate'] }}"
                                        data-service="{{ $shipping['service'] }}"
                                    >

                                    <div class="shippingInner rounded-[28px] border border-[#ECECEC] p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">

                                        <div class="flex items-center justify-between">

                                            <div>

                                                <h3 class="text-2xl font-bold text-[#1F2937]">
                                                    {{ $shipping['courier'] }}
                                                </h3>

                                                <p class="text-gray-500 mt-2">
                                                    {{ $shipping['service'] }} • {{ $shipping['estimate'] }}
                                                </p>

                                            </div>

                                            <div class="text-right">

                                                <div class="text-[#0B5D4B] font-bold text-2xl">
                                                    Rp {{ number_format($shipping['cost']) }}
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </label>

                            @endforeach

                        </div>

                    </div>

                    {{-- ===================================================== --}}
                    {{-- PAYMENT --}}
                    {{-- ===================================================== --}}

                    <div class="bg-white rounded-[32px] border border-[#ECECEC] shadow-sm p-8">

                        <h2 class="text-4xl font-bold text-[#1F2937] mb-8">
                            Payment Method
                        </h2>

                        <div class="grid md:grid-cols-2 gap-5">

                            @php

                                $payments = [

                                    ['name'=>'QRIS','fee'=>0],
                                    ['name'=>'BCA VA','fee'=>4000],
                                    ['name'=>'Mandiri VA','fee'=>4000],
                                    ['name'=>'BNI VA','fee'=>4000],
                                    ['name'=>'GoPay','fee'=>2500],
                                    ['name'=>'OVO','fee'=>2500],

                                ];

                            @endphp

                            @foreach($payments as $payment)

                                <label class="paymentCard cursor-pointer">

                                    <input
                                        type="radio"
                                        name="payment_method"
                                        class="hidden paymentRadio"
                                        data-fee="{{ $payment['fee'] }}"
                                        value="{{ $payment['name'] }}"
                                    >

                                    <div class="paymentInner rounded-[28px] border border-[#ECECEC] p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">

                                        <div class="flex items-center justify-between">

                                            <div>

                                                <h3 class="text-xl font-bold text-[#1F2937]">
                                                    {{ $payment['name'] }}
                                                </h3>

                                                <p class="text-gray-500 mt-2">
                                                    Secure payment gateway
                                                </p>

                                            </div>

                                            <div class="text-right">

                                                <div class="font-bold text-[#0B5D4B]">
                                                    Rp {{ number_format($payment['fee']) }}
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </label>

                            @endforeach

                        </div>

                    </div>

                </div>

                {{-- ===================================================== --}}
                {{-- RIGHT --}}
                {{-- ===================================================== --}}

                <div>

                    <div class="sticky top-24 bg-white rounded-[32px] border border-[#ECECEC] shadow-sm p-8">

                        <h2 class="text-3xl font-bold text-[#1F2937] mb-8">
                            Order Summary
                        </h2>

                        {{-- PRODUCTS --}}
                        <div class="space-y-5 max-h-[350px] overflow-y-auto pr-2">

                            @php
                                $subtotal = 0;
                            @endphp

                            @foreach(session('cart', []) as $id => $item)

                                @php
                                    $subtotal += $item['price'] * $item['quantity'];
                                @endphp

                                <div class="flex gap-4">

                                    <div class="w-24 h-24 rounded-2xl overflow-hidden border border-[#ECECEC]">

                                        <img
                                            src="{{ asset('storage/' . $item['thumbnail']) }}"
                                            class="w-full h-full object-cover"
                                        >

                                    </div>

                                    <div class="flex-1">

                                        <h3 class="font-semibold text-[#1F2937]">
                                            {{ $item['name'] }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1">
                                            Qty: {{ $item['quantity'] }}
                                        </p>

                                        <div class="mt-3 text-[#0B5D4B] font-bold">
                                            Rp {{ number_format($item['price']) }}
                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                        {{-- SUMMARY --}}
                        <div class="border-t border-dashed border-[#ECECEC] my-8"></div>

                        <div class="space-y-5">

                            <div class="flex justify-between">

                                <span class="text-gray-500">
                                    Subtotal
                                </span>

                                <span class="font-semibold">
                                    Rp {{ number_format($subtotal) }}
                                </span>

                            </div>

                            <div class="flex justify-between">

                                <span class="text-gray-500">
                                    Shipping
                                </span>

                                <span id="shippingText" class="font-semibold">
                                    Rp 0
                                </span>

                            </div>

                            <div class="flex justify-between">

                                <span class="text-gray-500">
                                    Admin Fee
                                </span>

                                <span id="adminFeeText" class="font-semibold">
                                    Rp 0
                                </span>

                            </div>

                            <div class="flex justify-between">

                                <span class="text-gray-500">
                                    Courier
                                </span>

                                <span id="selectedCourier" class="font-semibold">
                                    -
                                </span>

                            </div>

                            <div class="flex justify-between">

                                <span class="text-gray-500">
                                    Payment
                                </span>

                                <span id="selectedPayment" class="font-semibold">
                                    -
                                </span>

                            </div>

                        </div>

                        {{-- TOTAL --}}
                        <div class="border-t border-[#ECECEC] mt-8 pt-8">

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="text-gray-500 text-sm">
                                        Grand Total
                                    </p>

                                    <h3
                                        id="grandTotalText"
                                        class="text-4xl font-bold text-[#0B5D4B] mt-2"
                                    >
                                        Rp {{ number_format($subtotal) }}
                                    </h3>

                                </div>

                            </div>

                        </div>

                        {{-- BUTTON --}}
                        <button
                            type="submit"
                            id="placeOrderButton"
                            disabled
                            class="w-full h-16 rounded-2xl bg-[#0B5D4B] text-white font-semibold text-lg mt-8 opacity-50 cursor-not-allowed hover:bg-[#083C31] transition-all duration-300"
                        >
                            Place Order
                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>



{{-- LEAFLET --}}
<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet/dist/leaflet.css"
/>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    // INIT MAP
    const map = L.map('map').setView([-6.200000, 106.816666], 13);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution: '&copy; OpenStreetMap contributors'
        }
    ).addTo(map);

    // MARKER
    const marker = L.marker(
        [-6.200000, 106.816666],
        {
            draggable: true
        }
    ).addTo(map);

    // REVERSE GEOCODE
    async function reverseGeocode(lat, lon)
    {
        try {

            const response = await fetch(
                `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`
            );

            const data = await response.json();

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;

            document.getElementById('streetAddress').value =
                data.display_name || '';

            document.getElementById('province').value =
                data.address.state || '';

            document.getElementById('city').value =
                data.address.city ||
                data.address.county ||
                '';

            marker.setLatLng([lat, lon]);

            map.flyTo([lat, lon], 16);

        } catch (error) {

            console.log(error);

        }
    }

    // CLICK MAP
    map.on('click', function (e) {

        reverseGeocode(
            e.latlng.lat,
            e.latlng.lng
        );

    });

    // DRAG MARKER
    marker.on('dragend', function () {

        const pos = marker.getLatLng();

        reverseGeocode(
            pos.lat,
            pos.lng
        );

    });

    // LOCATE ME
    document
        .getElementById('locateMe')
        .addEventListener('click', function () {

            navigator.geolocation.getCurrentPosition(

                function (position) {

                    const lat =
                        position.coords.latitude;

                    const lon =
                        position.coords.longitude;

                    reverseGeocode(lat, lon);

                },

                function () {

                    alert('Location access denied');

                }

            );

        });

});
</script>

{{-- ===================================================== --}}
{{-- JAVASCRIPT --}}
{{-- ===================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    let subtotal = {{ $subtotal }};
    let shippingCost = 0;
    let adminFee = 0;

    const shippingText =
        document.getElementById('shippingText');

    const adminFeeText =
        document.getElementById('adminFeeText');

    const grandTotalText =
        document.getElementById('grandTotalText');

    const selectedCourier =
        document.getElementById('selectedCourier');

    const selectedPayment =
        document.getElementById('selectedPayment');

    const placeOrderButton =
        document.getElementById('placeOrderButton');

    // =====================================================
    // MAP
    // =====================================================

    const map = L.map('map').setView([-6.200000, 106.816666], 13);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution: '&copy; OpenStreetMap'
        }
    ).addTo(map);

    const marker = L.marker(
        [-6.200000, 106.816666],
        {
            draggable: true
        }
    ).addTo(map);

    async function reverseGeocode(lat, lon)
    {
        const response = await fetch(
            `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`
        );

        const data = await response.json();

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lon;

        document.getElementById('streetAddress').value =
            data.display_name || '';

        document.getElementById('province').value =
            data.address.state || '';

        document.getElementById('city').value =
            data.address.city ||
            data.address.county ||
            '';

        document.getElementById('district').value =
            data.address.suburb ||
            data.address.village ||
            '';

        document.getElementById('postalCode').value =
            data.address.postcode || '';

        validateCheckout();
    }

    map.on('click', function (e) {

        marker.setLatLng(e.latlng);

        reverseGeocode(
            e.latlng.lat,
            e.latlng.lng
        );

    });

    marker.on('dragend', function () {

        const pos = marker.getLatLng();

        reverseGeocode(pos.lat, pos.lng);

    });

    // =====================================================
    // LOCATE ME
    // =====================================================

    document.getElementById('locateMe')
        .addEventListener('click', function () {

            if (!navigator.geolocation) {

                alert('Geolocation not supported');

                return;
            }

            this.innerHTML = 'Detecting...';

            navigator.geolocation.getCurrentPosition(

                async(position) => {

                    const lat =
                        position.coords.latitude;

                    const lon =
                        position.coords.longitude;

                    map.flyTo([lat, lon], 16);

                    marker.setLatLng([lat, lon]);

                    await reverseGeocode(lat, lon);

                    this.innerHTML =
                        '📍 Location Detected';

                },

                () => {

                    alert('Please allow location access');

                    this.innerHTML =
                        '📍 Locate Me';

                }

            );

        });

    <script>

document.addEventListener('DOMContentLoaded', function () {

    let subtotal = {{ $subtotal }};
    let shippingCost = 0;
    let adminFee = 0;

    const shippingText = document.getElementById('shippingText');
    const adminFeeText = document.getElementById('adminFeeText');
    const grandTotalText = document.getElementById('grandTotalText');

    const selectedCourier = document.getElementById('selectedCourier');
    const selectedPayment = document.getElementById('selectedPayment');

    const placeOrderButton = document.getElementById('placeOrderButton');

    // HIDDEN INPUT
    const shippingCourierInput =
        document.getElementById('shippingCourierInput');

    const shippingServiceInput =
        document.getElementById('shippingServiceInput');

    const shippingCostInput =
        document.getElementById('shippingCostInput');

    const paymentMethodInput =
        document.getElementById('paymentMethodInput');

    const paymentFeeInput =
        document.getElementById('paymentFeeInput');

    const grandTotalInput =
        document.getElementById('grandTotalInput');

    // =========================================
    // UPDATE TOTAL
    // =========================================

    function updateTotal()
    {
        let total =
            subtotal + shippingCost + adminFee;

        grandTotalText.innerHTML =
            'Rp ' + total.toLocaleString('id-ID');

        grandTotalInput.value = total;
    }

    // =========================================
    // VALIDATION
    // =========================================

    function validateCheckout()
    {
        const shippingSelected =
            document.querySelector('.shippingRadio:checked');

        const paymentSelected =
            document.querySelector('.paymentRadio:checked');

        const recipient =
            document.getElementById('recipientName').value.trim();

        const phone =
            document.getElementById('phoneNumber').value.trim();

        const address =
            document.getElementById('streetAddress').value.trim();

        if (
            shippingSelected &&
            paymentSelected &&
            recipient !== '' &&
            phone !== '' &&
            address !== ''
        ) {

            placeOrderButton.disabled = false;

            placeOrderButton.classList.remove(
                'opacity-50',
                'cursor-not-allowed'
            );

        } else {

            placeOrderButton.disabled = true;

            placeOrderButton.classList.add(
                'opacity-50',
                'cursor-not-allowed'
            );

        }
    }

    // =========================================
    // SHIPPING
    // =========================================

    document.querySelectorAll('.shippingRadio')
        .forEach(radio => {

            radio.addEventListener('change', function () {

                shippingCost =
                    parseInt(this.dataset.cost);

                const courier =
                    this.value;

                const estimate =
                    this.dataset.day;

                // UI
                shippingText.innerHTML =
                    'Rp ' + shippingCost.toLocaleString('id-ID');

                selectedCourier.innerHTML =
                    courier + ' • ' + estimate;

                // HIDDEN INPUT
                shippingCourierInput.value =
                    courier;

                shippingServiceInput.value =
                    estimate;

                shippingCostInput.value =
                    shippingCost;

                // ACTIVE CARD
                document.querySelectorAll('.shippingInner')
                    .forEach(el => {

                        el.classList.remove(
                            'border-[#0B5D4B]',
                            'bg-[#0B5D4B]/5',
                            'shadow-xl'
                        );

                    });

                this.closest('.shippingCard')
                    .querySelector('.shippingInner')
                    .classList.add(
                        'border-[#0B5D4B]',
                        'bg-[#0B5D4B]/5',
                        'shadow-xl'
                    );

                updateTotal();

                validateCheckout();

            });

        });

    // =========================================
    // PAYMENT
    // =========================================

    document.querySelectorAll('.paymentRadio')
        .forEach(radio => {

            radio.addEventListener('change', function () {

                adminFee =
                    parseInt(this.dataset.fee);

                const payment =
                    this.value;

                // UI
                adminFeeText.innerHTML =
                    'Rp ' + adminFee.toLocaleString('id-ID');

                selectedPayment.innerHTML =
                    payment;

                // HIDDEN INPUT
                paymentMethodInput.value =
                    payment;

                paymentFeeInput.value =
                    adminFee;

                // ACTIVE CARD
                document.querySelectorAll('.paymentInner')
                    .forEach(el => {

                        el.classList.remove(
                            'border-[#0B5D4B]',
                            'bg-[#0B5D4B]/5',
                            'shadow-xl'
                        );

                    });

                this.closest('.paymentCard')
                    .querySelector('.paymentInner')
                    .classList.add(
                        'border-[#0B5D4B]',
                        'bg-[#0B5D4B]/5',
                        'shadow-xl'
                    );

                updateTotal();

                validateCheckout();

            });

        });

    // =========================================
    // INPUT VALIDATION
    // =========================================

    document.getElementById('recipientName')
        .addEventListener('input', validateCheckout);

    document.getElementById('phoneNumber')
        .addEventListener('input', validateCheckout);

    document.getElementById('streetAddress')
        .addEventListener('input', validateCheckout);

    // =========================================
    // SUBMIT BUTTON LOADING
    // =========================================

    document.getElementById('checkoutForm')
        ?.addEventListener('submit', function () {

            placeOrderButton.innerHTML =
                'Processing Order...';

            placeOrderButton.disabled = true;

        });

});

</script>

<div class="h-32"></div>
@endsection