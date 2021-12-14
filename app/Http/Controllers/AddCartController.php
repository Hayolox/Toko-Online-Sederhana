<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddCartController extends Controller
{
    public function add ($id)
    {
        $item = product::findOrFail($id);
        $carts = cart::with(['product', 'user'])->where('user_id', Auth::user()->id)->where('product_id', $id)->get();
        $countcarts = cart::with(['product', 'user'])->where('user_id', Auth::user()->id)->where('product_id', $id)->count();
        $count = cart::with(['product', 'user'])->where('user_id', Auth::user()->id)->count();
        if($count > 0 ){
            if($countcarts > 0) {
                foreach ($carts as $cart){
                    if ($item->id == $cart->product_id){
                       $qty = cart::where('product_id', $cart->product_id)->firstOrFail();
                       $quan = 1;
                       $sum = $qty->qty+$quan;
                       $qty->update([
                            'qty' => $sum,
                       ]);
                    }else{
                        cart::create([
                            'user_id' => Auth::user()->id,
                            'product_id' => $id,
                        ]);
                    };
                };
            }else{
                cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                ]);
            }

        }else{
            cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
            ]);
        }

        $stok = $item->stok - 1;
        $item->update([
            'stok' => $stok,
        ]);
        return redirect()->route('cart');
    }
}
