<?php

namespace App\Http\Controllers;

use App\Helper\ShoppingCart;
use App\Jobs\SendEmail;
use App\Models\Attribute;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payments;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function add(Product $pro, ShoppingCart $cart)
    {
        if(!request('size')) {
            return redirect()->back();
        } else {
            $quantity = request('quantity',1);
            $sizeId = request('size');
            $colorId = request('color');
            $size = Attribute::find($sizeId);
            $color = Attribute::find($colorId);
            $cart->add($pro,$size,$color,$quantity);

            return redirect()->route('view');
        }
    }

    public function clear(ShoppingCart $cart)
    {
        $cart->clear();
        return redirect()->route('shop');
    }

    public function delete($id, ShoppingCart $cart)
    {
        $sizeId = request('size');
        $colorId = request('color');
        $size = Attribute::find($sizeId);
        $color = Attribute::find($colorId);
            $cart->delete($id,$size,$color);
        return redirect()->route('view');
    }

    public function update($id, ShoppingCart $cart)
    {
        $sizeId = request('size');
        $colorId = request('color');
        $size = Attribute::find($sizeId);
        $color = Attribute::find($colorId);
        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? floor($quantity) : 1;
        $cart->update($id,$quantity,$color,$size);
        return redirect()->route('view');
    }

    public function view(ShoppingCart $cart)
    {
        return view('cart',compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(ShoppingCart $cart)
    {
        $payments = Payments::all();
        return view('checkout',compact('cart','payments'));
    }

    // Xử lí đơn đặt hàng
    public function order(Request $request, ShoppingCart $cart)
    {
            $data = $request->only('user_id','full_name','address','phone','email','payment_id','status','price_shipping');
            if(!$data) {
                return redirect()->route('login');
            } else {
                $order = Order::create([
                    'user_id' => $data['user_id'],
                    'full_name' => $data['full_name'],
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'payment_id' => $data['payment_id'],
                    'status' => 0,
                    'price_shipping' => $cart->shipping
                ]);
            }
            if(!$cart->items) {
                return redirect()->back();
            } else {
                foreach($cart->items as $item) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $item->id,
                        'name' => $item->name,
                        'quantity' => $item->quantity,
                        'color_id' => $item->color->id,
                        'size_id' => $item->size->id,
                        'amount' => $item->quantity * $item->price
                    ]);
                }
            }
            $name = $request->full_name;
            $email = $request->email;
            Mail::send('mail_order',
                [
                    'name' => $name,
                    'order' => $order,
                    'items' => $cart->items
                ], function ($mail) use ($name,$email) {
                    $mail->from('dth.trongsan@gmail.com');
                    $mail->to($email, $name)->subject('Đơn đặt hàng!');
            });
        // Xóa giỏ hàng sau khi thanh toán thành công
            session(['cart' => []]);
            return redirect()->route('shop');
        }
}
