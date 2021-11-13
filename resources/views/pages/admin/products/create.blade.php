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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Product</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger mt-2 mb-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('Product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="image">Foto Obat</label>
                            <input type="file" value="" class="form-control-file" id="foto" name="image">
                        </div>


                        <div class="form-group">
                            <label for="name">Nama Obat</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok Obat</label>
                            <input type="number" name="stok" value="{{ old('stok') }}" class="form-control" id="stok">
                        </div>

                        <div class="form-group">
                            <label for="price">Harga Obat</label>
                            <input type="number" name="price" value="{{ old('price') }}" class="form-control" id="price">
                        </div>

                        <div class="form-group mt-2">
                            <label for="desctiption">Diskripsi Obat</label>
                            <textarea class="form-control" id="editor" name="desctiption" rows="3">{{ old('desctiption') }}</textarea>
                        </div>



                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor' );
</script>

@endsection
