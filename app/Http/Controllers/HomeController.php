<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function home() {
        $products = Product::all();

        if(Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = "";
        }

        return view('home.index', compact('products', 'count'));
    }

    public function login_home() {
        $products = Product::all();

        if(Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = "";
        }

        return view('home.index', compact('products', 'count'));
    }

    public function productDetails($id) {
        $product = Product::find($id);

        if(Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = "";
        }

        return view('home.product_details', compact('product', 'count'));    
    }

    public function addCart($id) {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id ;
        
        $cart = new Cart();
        $cart->product_id = $product_id;
        $cart->user_id = $user_id;
        $cart->save();

        toastr()->success('Product added to cart successfully');
        return redirect()->back();
    }

    public function mycart () {
        if(Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();

            $cart = Cart::where('user_id', $user_id)->get();
        }

        return view('home.mycart', compact('count', 'cart'));
    }
}
