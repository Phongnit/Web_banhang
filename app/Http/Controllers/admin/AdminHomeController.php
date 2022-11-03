<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\User;
use App\Utiles\Constants;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminHomeController extends Controller
{
    public function home() {
        return view('admin.index');
    }

    public function dashbroad()
    {
        $user = User::count();
        $product = Product::count();
        $product_qty = Product::where('qty',0)->count();
        $order = Order::count();
        return view('admin.dashbroad',compact('user','product','order','product_qty'));
    }
}
