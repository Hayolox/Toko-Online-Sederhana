<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $sukses = transaction::where('transaction_status', 'SUKSES')->count();
        $gagal = transaction::where('transaction_status', 'BATAL')->count();
        $antrian = transaction::where('transaction_status', 'ANTRIAN')->count();
        $total_price = transaction::where('transaction_status', 'SUKSES')->sum('total_price');
        return view('pages.admin.dashboard',compact('sukses','gagal','antrian','total_price'));
    }
}
