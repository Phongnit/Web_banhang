<?php

namespace App\Http\Controllers;

use App\Helper\ShoppingCart;
use App\Models\Blog;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShoppingCart $cart)
    {
        $products = Product::orderBy('created_at','DESC')->where('status','1')->search()->limit(6)->get();
        $productsSale = Product::orderBy('created_at','DESC')->where('discount', '>', 0)->search()->limit(6)->get();
        return view('index',compact('products','cart','productsSale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function my_account($id) {
        $orders = Order::where('user_id', $id)->get();
        $user = User::where('id',$id)->get();
        return view('my_account',compact('user','orders'));
    }
}
