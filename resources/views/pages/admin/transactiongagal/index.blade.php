@extends('layouts.admin')
@section('title', 'Admin')
@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transaction Batal</h6>
        </div>
        <div class="card-body">
            <div class="col-12 mb-3 d-flex">
                <div style="margin-left: 650px">
                    <form action="{{ route('transaction-gagal') }}" class="d-inline-block form-inline">
                        <input class="form-control mr-sm-2" name="search" type="text" placeholder="Nama" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0 d-inline-block" type="submit">Search</button>
                    </form>
                </div>
        </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Nama</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @foreach ($transactions as $data => $item)
                    <tbody>
                        <td>{{ $transactions->firstItem() + $data }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>
                        <td> Rp {{ number_format($item->total_price, 0, ".", ".") }}</td>
                        <td>
                            <a href="{{ route('queue-detail', $item->id) }}" class="btn btn-info">Detail</a>
                        </td>
                    </tbody>
                    @endforeach
                </table>
               <div class="d-flex justify-content-center mt-4">
                {{ $transactions->links() }}
               </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
