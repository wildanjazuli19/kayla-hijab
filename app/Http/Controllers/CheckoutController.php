<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([

            'recipient_name'   => 'required|string|max:255',

            'phone'            => 'required|string|max:20',

            'street_address'   => 'required|string',

            'province'         => 'nullable|string',

            'city'             => 'nullable|string',

            'district'         => 'nullable|string',

            'postal_code'      => 'nullable|string',

            'latitude'         => 'nullable',

            'longitude'        => 'nullable',

            'shipping_courier' => 'required|string',

            'shipping_service' => 'required|string',

            'shipping_cost'    => 'required|numeric',

            'payment_method'   => 'required|string',

            'payment_fee'      => 'nullable|numeric',

            'grand_total'      => 'required|numeric',

        ]);

        DB::beginTransaction();

        try {

            $cart = session()->get('cart', []);

            if (empty($cart)) {

                return back()->with('error', 'Cart kosong');

            }

            // =========================================
            // HITUNG SUBTOTAL
            // =========================================

            $subtotal = 0;

            foreach ($cart as $item) {

                $subtotal +=
                    $item['price'] * $item['quantity'];

            }

            // =========================================
            // SHIPPING & PAYMENT
            // =========================================

            $shippingCost =
                (int) $request->shipping_cost;

            $paymentFee =
                (int) $request->payment_fee;

            $grandTotal =
                $subtotal +
                $shippingCost +
                $paymentFee;

            // =========================================
            // INVOICE
            // =========================================

            $invoiceNumber =
                'KH-' . date('Ymd') . '-' . strtoupper(Str::random(6));

            $transactionCode =
                'TRX-' . strtoupper(Str::random(10));

            // =========================================
            // CREATE ORDER
            // =========================================

            $order = Order::create([

                'user_id'           => auth()->id(),

                'invoice_number'    => $invoiceNumber,

                'transaction_code'  => $transactionCode,

                'recipient_name'    => $request->recipient_name,

                'phone'             => $request->phone,

                'street_address'    => $request->street_address,

                'province'          => $request->province,

                'city'              => $request->city,

                'district'          => $request->district,

                'postal_code'       => $request->postal_code,

                'latitude'          => $request->latitude,

                'longitude'         => $request->longitude,

                'shipping_method'   => $request->shipping_courier,

                'shipping_service'  => $request->shipping_service,

                'shipping_cost'     => $shippingCost,

                'payment_method'    => $request->payment_method,

                'payment_fee'       => $paymentFee,

                'subtotal'          => $subtotal,

                'grand_total'       => $grandTotal,

                'payment_status'    => 'pending',

                'order_status'      => 'pending',

            ]);

            // =========================================
            // CREATE ORDER ITEMS
            // =========================================

            foreach ($cart as $id => $item) {

                OrderItem::create([

                    'order_id'      => $order->id,

                    'product_id'    => $id,

                    'product_name'  => $item['name'],

                    'price'         => $item['price'],

                    'quantity'      => $item['quantity'],

                    'subtotal'      => $item['price'] * $item['quantity'],

                ]);

                // =====================================
                // REDUCE STOCK
                // =====================================

                $product = Product::find($id);

                if ($product) {

                    $product->stock =
                        max(0, $product->stock - $item['quantity']);

                    $product->save();

                }

            }

            // =========================================
            // CLEAR CART
            // =========================================

            session()->forget('cart');

            DB::commit();

            // =========================================
            // REDIRECT
            // =========================================

            return redirect()
                ->route('home')
                ->with('success', 'Order berhasil dibuat');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(

                'error',
                $e->getMessage()

            );

        }
    }
}