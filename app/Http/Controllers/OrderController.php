<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use App\Product;
use App\User;
use App\OrderDetail;
use Stripe\Stripe;
use Stripe\Checkout;
use Stripe\Checkout\Session;



class OrderController extends Controller
{

    public function orderConfirm()
    {

        $order_details = Cart::content();

        return  view("front.address");
    }


    public function addToCart(Request $req)
    {

        $pro = Product::where('id', $req->goid)->firstOrFail();
        $cartItem = Cart::add([
            'id' => $pro->id,
            'name' => $pro->name,
            'qty' => 1,
            'price' => $req->price,

        ]);

        toastr()->success('Item added succesfully');
        $req->session()->put('add', $pro->id);
        return redirect()->back();
    }

    public function addnow(Request $req)
    {
        $pro = Product::where('id', $req->id)->first();
        $price = $req->price;
        $cartItem = Cart::add([
            'id' => $pro->id,
            'name' => $pro->name,
            'qty' => $req->qty,
            'price' => $price,

        ]);
        $req->session()->put('add', $pro->id);
        toastr()->success('Item added succesfully');
        return redirect()->back();
    }

    public function remove(Request $req)
    {
        Cart::remove($req->id);
        $req->session()->forget('add');
        toastr()->error('Item deleted succesfully');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $qty = $request->qty;
        $id = $request->id;
        Cart::update($id, $qty);
        toastr()->info('Quantity updated seccesfully');
        return redirect()->back();
    }

    public function confirm(Request $req)
    {
        if ($req->confirm == 1) {
            $confirm = Order::where('id', $req->id)->update([
                'etat' => 0,
            ]);
            return redirect()->back();
        }
        if ($req->confirm == 0) {
            $confirm = Order::where('id', $req->id)->update([
                'etat' => 1,
            ]);
            return redirect()->back();
        }
    }


    public function generateRandomString()
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 15)), 0, 15);
    }


    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_TEST_SK'));
        $products = $request->input('products'); // Expecting an array of products

        if ($products != null) {
            // Prepare line items for Stripe Checkoutdd
            $lineItems = [];

            foreach ($products as $product) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'EUR',
                        'product_data' => [
                            'name' => $product['name']
                        ],
                        'unit_amount' => $product['price'] * 100 // Convert to cents
                    ],
                    'quantity' => $product['qty']
                ];
            }
            $productDetails = http_build_query($products);


            // Charge the customer
            $charge = Session::create([

                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('success', ['products' => $productDetails]),
                'cancel_url' => route('failed')

            ]);

            return redirect()->away($charge->url);
        } else {
            toastr()->error("An error occur on server please try later");
            return redirect()->back();
        }
    }



    public function success(Request $request)
    {

        $client =  User::where('id', session()->get('logged'))->first();
        $ref = $this->generateRandomString();
        $shipping = Address::where('user_id', $client->id)->first();
        $order = Order::create([
            'client_id' => $client->id,
            'ref' => $ref,
            'client_name' => $shipping->name . " " . $shipping->lastname,
            'client_phone' => $shipping->phone,
            'address' => $shipping->address,
            'city' => $shipping->city,
            'country' => $shipping->country,
            'zip' => $shipping->zip,
            'montant' => Cart::subtotal(),

        ]);


        foreach (Cart::content() as $item) {
            $prod = Product::where('id', $item->id)->first();
            $order_det = OrderDetail::create([
                'order_id' => $order->id,
                'product' => $prod->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'montant' => $item->price * $item->qty,
            ]);
            $stock = $prod->stock - ($item->options->size * $item->qty);
            $product = Product::where('id', $item->id)->update([

                'stock' => $stock,

            ]);
        }


        Cart::destroy();
        $request->session()->forget('add');
        return redirect('/thank-you');
    }
    public function failed()
    {

        return redirect('/cart');
    }
    public function checkout(Request $request) {}
}
