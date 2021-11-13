<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $Products = product::latest()->paginate(10);
        if($request->has('search')){
            $Products = product::where('name', 'LIKE', '%' .$request->search. '%')->paginate();
        };  
        return view('pages.home', compact('Products'));
    }
}
