<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $details = TransactionDetail::where('transaction_id', $item->id)->get();
        foreach ($details as $item)
        {
            $product = product::where('id', $item->product_id)->firstOrFail();
            $stok = $product->stok + 1;
            $product->update([
                'stok' => $stok,
            ]);
        }
        return back()->withToastSuccess('Transaksi Dibatalkan');
    }

    public function transaksisukses( Request $request)
    {
        if($request->has('search')){
            $transactions = DB::table('users')
            ->join('transactions', 'users.id', '=', 'transactions.user_id')
            ->select('users.name', 'transactions.*')
            ->where('transactions.transaction_status', 'SUKSES')
            ->where('users.name', 'LIKE', '%' .$request->search. '%')
            ->paginate(10);
        }else{
            $transactions = DB::table('users')
            ->join('transactions', 'users.id', '=', 'transactions.user_id')
            ->where('transactions.transaction_status', 'SUKSES')
            ->select('users.name', 'transactions.*')
            ->paginate(10);
        };
        return view('pages.admin.transactionsukses.index', compact('transactions'));
    }

    public function transaksigagal(Request $request)
    {
        if($request->has('search')){
            $transactions = DB::table('users')
            ->join('transactions', 'users.id', '=', 'transactions.user_id')
            ->select('users.name', 'transactions.*')
            ->where('transactions.transaction_status', 'BATAL')
            ->where('users.name', 'LIKE', '%' .$request->search. '%')
            ->paginate(10);
        }else{
            $transactions = DB::table('users')
            ->join('transactions', 'users.id', '=', 'transactions.user_id')
            ->where('transactions.transaction_status', 'BATAL')
            ->select('users.name', 'transactions.*')
            ->paginate(10);
        };
        return view('pages.admin.transactiongagal.index', compact('transactions'));
    }
}
