<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = product::latest()->paginate(10);
        if($request->has('search')){
            $products = product::where('name', 'LIKE', '%' .$request->search. '%')->paginate();
        };
        return view('pages.admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:225',
            'price' => 'required',
            'stok' => 'required',
            'image' => 'required|mimes:png,jpg',
            'desctiption' => 'required',
        ]);
        $aatr = $request->all();
        $aatr['image'] = $request->file('image')->store('asset/product', 'public');
        product::create($aatr);
        return back()->withToastSuccess('Data Berhasil Ditambahkan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = product::findOrFail($id);
        return view('pages.admin.products.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:225',
            'price' => 'required',
            'stok' => 'required',
            'image' => 'mimes:png,jpg',
            'desctiption' => 'required',
        ]);
        $aatr = $request->all();
        $item = product::findOrFail($id);
        if($request->file('image')){
            Storage::disk('local')->delete('public/'. $item->image);
            $aatr['image'] = $request->file('image')->store('asset/product', 'public');
        }
        $item->update($aatr);
        return back()->withToastSuccess('Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = product::findOrfail($id);
        Storage::disk('local')->delete('public/'. $item->image);
        $item->delete();
        return back()->withToastSuccess('Data Berhasil Dihapus');
    }
}
