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
        cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
        ]);
        $item = product::findOrFail($id);
        $stok = $item->stok - 1;
        $item->update([
            'stok' => $stok,
        ]);
        return redirect()->route('cart');
    }
}
