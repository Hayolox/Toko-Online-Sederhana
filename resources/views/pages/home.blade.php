@extends('layouts.app')
@section('title', 'Home')
@section('content')
     <!-- Page Content -->
     <div class="page-content page-home">
     
     
        <section class="store-new-products">
          <div class="container">
            <div class="row">
              <div class="col-12" data-aos="fade-up">
                <h5>Pilih Obat</h5>
              </div>
            </div>
            <div class="row">
              @foreach ($Products as $item)
              <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                            @if($item->image)
                                 background-image: url('{{ Storage::url($item->image) }}');
                            @else
                                background-color: #eee;
                            @endif
                    "
                  ></div>
                </div>
                <div class="products-text">
                {{ $item->name }} 
                </div>
                <div class="products-price">
                Harga :  Rp {{ number_format($item->price, 0, ".", ".") }} <br> Stok : {{ $item->stok }}
                </div>
              </a>
            </div>
              @endforeach
            </div>
          </div>
        </section>
      </div>

@endsection