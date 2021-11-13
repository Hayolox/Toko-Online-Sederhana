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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Member</h6>
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
                    <form action="{{ route('Member.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="name">Nama Member</label>
                            <input type="text" name="name" value="{{ $item->name }}" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{ $item->email }}" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password">
                        </div>


                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
