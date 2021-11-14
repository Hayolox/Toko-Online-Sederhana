<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Members = User::where('roles', 'member')->paginate(10);
        if($request->has('search')){
            $Members = User::where('name', 'LIKE', '%' .$request->search. '%')->where('roles', 'member')->paginate();
        };  
        return view('pages.admin.member.index', compact('Members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.member.create');
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
            'email' => 'required|unique:users,email',
            'name' => 'required|max:225',
            'password' => 'required'
        ],[
            'email.unique' => 'Email sudah di pakai',
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Nama maksimal 225 karakter',
            'password.required' => 'Password tidak boleh kosong'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles' => $request->roles,

        ]);
        return back()->withToastSuccess('Data Berhasil Ditambahkan');
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
        $item = User::where('roles', 'member')->findOrFail($id);
        return view('pages.admin.member.edit', compact('item'));
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
        $aatr = $request->all();
        if($request->password)
        {
            $aatr['password'] =  bcrypt($request->password);
        }
        else
        {
            unset($aatr['password']);
        }
        $item = User::where('roles', 'member')->findOrfail($id);
        $request->validate([
            'email' => 'unique:users,email,'.$item->id,
            'name' => 'required|max:225',
        ],[
            'email.unique' => 'Email sudah di pakai',
        ]);
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
        $item = User::findOrfail($id);
        $item->delete();
        return back()->withToastSuccess('Data Berhasil Dihapus');
    }
}
