<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Gloudemans\Shoppingcart\Facades\Cart;


class FrontController extends Controller
{
    public function index()
    {


        $products = \App\Product::where('trends', 1)->orderBy('id', 'DESC')->get();
        $categories = \App\Category::all();
        return view('front.index', compact('categories', 'products'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function test()
    {
        return view('front.test');
    }

    public function shop($category)
    {
        $cat = $category;
        $image = \App\Category::where('name', $category)->first()->image;
        $products = \App\Product::where('category', $category)->orderby('id', 'DESC')->get();
        return view('shop.cat', compact('cat', 'products', 'image'));
    }

    public function thank()
    {
        Cart::destroy();

        return view('front.thank');
    }
    public function address()
    {
        $user_id =  \App\User::where('id', session()->get('logged'))->first();
        $address =  \App\Address::where('user_id', $user_id->id)->first();
        $order_details = Cart::content();


        return view('front.address', compact('order_details', 'address'));
    }

    public function cat($category)
    {
        $cat = $category;
        $image = \App\Category::where('name', $category)->first()->image;
        $products = \App\Product::where('category', $category)->orderby('id', 'DESC')->get();
        return view('front.cat', compact('cat', 'products', 'image'));
    }

    public function prod($id)
    {
        $products = \App\Product::where('id', $id)->first();
        $price = \App\Size::where('prod_id', $products->id)->first();
        $images = \App\ProductImages::where('prod_id', $products->id)->get();


        return view('front.product', compact('products', 'price', 'images'));
    }

    public function cart()
    {
        return view('front.cart');
    }

    public function wish()
    {
        return view('front.wish');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function search(Request $request)
    {
        $query = $request->input('label');

        $products = \App\Product::where('name', 'like', "%$query%")->orwhere('category', 'like', "%$query%")->get();

        return view('front.search', compact('products', 'query'));
    }
}
