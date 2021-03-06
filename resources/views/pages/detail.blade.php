@extends('layouts.app')
@section('title', 'Detail')
@section('content')
  <!-- Page Content -->
  <div class="page-content page-details">
    <section
      class="store-breadcrumbs"
      data-aos="fade-down"
      data-aos-delay="100"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Obat Details
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="store-gallery" id="gallery">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8" data-aos="zoom-in">
            <img src="{{ Storage::url($item->image) }}" alt="">
          </div>
        </div>
      </div>
    </section>
    <div class="store-details-container" data-aos="fade-up">
      <section class="store-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <h1>{{ $item->name }}</h1>
              <div class="owner">Stok Obat : {{ $item->stok }}</div>
              <div class="price">{{ number_format($item->price, 0, ".", ".") }}</div>
            </div>
            @if ($item->stok > 0)
            <div class="col-lg-2" data-aos="zoom-in">
                <form action="{{ route('add-cart', $item->id) }}" method="POST">
                  @csrf
                  <button
                    type="submit"
                    class="btn btn-success px-4 text-white btn-block mb-3"
                  >
                    Add to Cart
                  </button>
                </form>
              </div>
            @else
                <div class="col-lg-2" data-aos="zoom-in">
                    @csrf
                    <button
                        type="submit"
                        class="btn btn-danger px-4 text-white btn-block mb-3"
                    >
                        Stok Habis
                    </button>
              </div>
            @endif
          </div>
        </div>
      </section>
      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <p>
                {!!$item->desctiption !!}
              </p>

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

@endsection
