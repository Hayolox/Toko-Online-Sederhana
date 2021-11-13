<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $Products = product::latest()->paginate(10);
        return view('pages.home', compact('Products'));
    }
}
