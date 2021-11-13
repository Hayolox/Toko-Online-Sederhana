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
            <div class="col-lg-2" data-aos="zoom-in">
              <a
                class="btn btn-success nav-link px-4 text-white btn-block mb-3"
                href="/cart.html"
                >Add to Cart</a
              >
            </div>
          </div>
        </div>
      </section>
      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <p>
                The Nike Air Max 720 SE goes bigger than ever before with
                Nike's tallest Air unit yet for unimaginable, all-day comfort.
                There's super breathable fabrics on the upper, while colours
                add a modern edge.
              </p>
              <p>
                Bring the past into the future with the Nike Air Max 2090, a
                bold look inspired by the DNA of the iconic Air Max 90.
                Brand-new Nike Air cushioning underfoot adds unparalleled
                comfort while transparent mesh and vibrantly coloured details
                on the upper are blended with timeless OG features for an
                edgy, modernised look.
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>   
    
@endsection