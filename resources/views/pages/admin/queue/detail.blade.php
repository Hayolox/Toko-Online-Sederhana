@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
           <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Nama Obat</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            
                            @foreach ($data as $aatr => $item)
                            <tbody>  
                                <td>{{ $data->firstItem() + $aatr }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->product->image) }}" style="height: 100px" alt="product">
                                </td>
                                <td>{{ $item->product->name }}</td>
                                <td>Rp {{ number_format($item->product->price, 0, ".", ".") }}</td>
                            </tbody>
                            @endforeach  
                        </table>
                       <div class="d-flex justify-content-center mt-4">
                        {{ $data->links() }}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
 
@endsection