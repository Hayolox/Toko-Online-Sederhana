<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use App\Models\transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = cart::with(['product', 'user'])->where('user_id', Auth::user()->id)->get();
        $count = cart::with(['product', 'user'])->where('user_id', Auth::user()->id)->count();
        return view('pages.cart', compact('carts','count'));
    }

    public function transaction(Request $request)
    {
        $code = mt_rand(0000,9999);
        $carts = cart::with(['product','user'])
                    ->where('user_id', Auth::user()->id)
                    ->get();

         $transaction = transaction::create([
            'user_id' => Auth::user()->id,
            'total_price' => $request->total_price,
            'transaction_status' => 'ANTRIAN',
            'code' => $code
        ]);
        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product->id,
                'price' => $cart->product->price,
            ]);
        }
          cart::with(['product','user'])
          ->where('user_id', Auth::user()->id)
          ->delete();
        return redirect()->route('logout-cart');
    }

    public function delete( Request $request, $id)
    {
        $item = cart::findOrFail($id);
        $product = product::where('id', $item->product->id)->firstOrFail();
        $stok = $product->stok + 1;
        $product->update([
            'stok' => $stok,
        ]);
        $item->delete();
        return back()->withToastSuccess('Data Berhasil Dihapus');
    }
}
