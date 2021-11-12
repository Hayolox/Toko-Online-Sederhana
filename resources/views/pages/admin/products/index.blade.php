@extends('layouts.admin')
@section('title', 'Admin Identities')
@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <div class="col-12 mb-3 d-flex">
                    <div>
                        <a href="{{ route('Product.create') }}" class="btn btn-info">Tambah Product</a>
                    </div>

                    <div style="margin-left: 520px">
                        <form action="{{ route('Product.index') }}" class="d-inline-block form-inline">
                            <input class="form-control mr-sm-2" name="search" type="text" placeholder="Nama Obat" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 d-inline-block" type="submit">Search</button>
                        </form>
                    </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Nama Obat</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    @foreach ($products as $data => $item)
                    <tbody>  
                        <td>{{ $products->firstItem() + $data }}</td>
                        <td>
                            <img src="{{ Storage::url($item->image) }}" style="height: 100px" alt="product">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{ route('Product.edit',$item->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('Product.destroy',$item->id) }}" onclick="return confirm('Yakin Untuk Menghapus?')" class="d-inline" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td> 
                    </tbody>
                    @endforeach  
                </table>
               <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
               </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 
@endsection