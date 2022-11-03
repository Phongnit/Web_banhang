<?php
namespace App\Helper;
use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCart {
    public $items = [];
    public $totalAmount = 0;
    public $totalQuantity = 0;
    public $shipping = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalAmount = $this->getTotalAmount();
        $this->totalQuantity = $this->getTotalQtt();
        $this->shipping = 30000;
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add($product, $size, $color, $quantity)
    {
        if(!request('size')){
            return redirect()->back();
        } else {
            $key = $product->id.$size->id.$color->id;
            if(isset($this->items[$key])) {
                $this->items[$key]->quantity += $quantity;
            } else {
                $item = (object) [
                    'id' => $product->id,
                    'name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $product->discount ? $product->discount : $product->price,
                    'image' => $product->ProductImage[0]->path,
                    'size' => $size,
                    'color' => $color
                ];
                $this->items[$key] = $item;
            }
        }
        session(['cart'=>$this->items]);
    }

    public function clear()
    {
        session(['cart' => []]);
    }

    // Cập nhật sản phẩm trong giỏ hàng
    public function update($id, $quantity, $color, $size)
    {
        $key = $id.$size->id.$color->id;
        if(isset($this->items[$key])) {
            $this->items[$key]->quantity = $quantity;
            session(['cart'=>$this->items]);
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function delete($id, $size, $color)
    {
        $key = $id.$size->id.$color->id;
        if(isset($this->items[$key])) {
            unset($this->items[$key]);
            session(['cart'=>$this->items]);
        }
    }

    private function getTotalQtt()
    {
        $totalQtt = 0;
        foreach ($this->items as $item) {
            $totalQtt += $item->quantity;
        }
        return $totalQtt;
    }

    private function getTotalAmount()
    {
        $totalAmount = 0;
        foreach ($this->items as $item) {
            $totalAmount += $item->quantity * $item->price;
        }
        return $totalAmount;
    }
}
?>
