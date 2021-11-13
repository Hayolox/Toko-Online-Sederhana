<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id)
    {
        $item = product::findOrFail($id);
        return view('pages.detail', compact('item'));
    }
}
