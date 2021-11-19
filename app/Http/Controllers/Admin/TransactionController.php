<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $queue = transaction::with(['user'])->where('transaction_status', 'ANTRIAN')->paginate(10);
        return view('pages.admin.queue.queue', compact('queue'));
    }

    public function detail($id)
    {
        $data = TransactionDetail::with(['product'])->where('transaction_id', $id)->paginate(10);
        $item = transaction::with(['user'])->where('id', $id)->firstOrFail();
        return view('pages.admin.queue.detail', compact('data','item'));
    }

    public function sukses($id)
    {
        $item = transaction::findOrFail($id);
        $item->update([
            'transaction_status' => 'SUKSES',
        ]);
        return redirect()->route('queue')->withToastSuccess('Transaksi Sukses');
    }

    public function batal($id)
    {
        $item = transaction::findOrFail($id);
        $item->update([
            'transaction_status' => 'BATAL',
        ]);
        return back()->withToastSuccess('Transaksi Dibatalkan');
    }

    public function transaksisukses()
    {
        $transactions = transaction::with(['user'])->where('transaction_status', 'SUKSES')->paginate(10);
        return view('pages.admin.transactionsukses.index', compact('transactions'));
    }

    public function transaksigagal()
    {
        $transactions = transaction::with(['user'])->where('transaction_status', 'BATAL')->paginate(10);
        return view('pages.admin.transactiongagal.index', compact('transactions'));
    }
}
