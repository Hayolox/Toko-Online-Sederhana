@extends('layouts.app')
@section('title', 'Cart')
@section('content')
    <!-- Page Content -->
    <div class="page-content page-cart">
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
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Cart
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="store-cart">
          <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="col-12 table-responsive">
                <table
                  class="table table-borderless table-cart"
                  aria-describedby="Cart"
                >
                  <thead>
                    <tr>
                      <th scope="col">Image</th>
                      <th scope="col">Nama Obat &amp; Seller</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Menu</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $totalPrice = 0 @endphp
                   @foreach ($carts as $item)
                   <tr>
                    <td style="width: 25%;">
                      <img
                        src="{{ Storage::url($item->product->image) }}"
                        alt=""
                        class="cart-image"
                      />
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">{{ $item->product->name }}</div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">{{ number_format($item->product->price, 0, ".", ".") }}</div>
                      <div class="product-subtitle">Rupiah</div>
                    </td>
                    <td style="width: 20%;">
                      <a href="{{ route('cart-delete',$item->id) }}" onclick="return confirm('Yakin untuk remove?')" class="btn btn-remove-cart">
                        Remove
                      </a>
                    </td>
                  </tr>
                  @php $totalPrice += $item->product->price @endphp
                   @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr />
              </div>
              <div class="col-12">
                <h2>Payment Informations</h2>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-4 col-md-2">
                <div class="product-title">{{ $count }}</div>
                <div class="product-subtitle">Jumlah Obat Dibeli</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title text-success">Rp {{ number_format($totalPrice, 0, ".", "." ?? 0) }}</div>
                <div class="product-subtitle">Total</div>
              </div>
              <div class="col-8 col-md-3">
                  <form action="{{ route('checkout') }}" method="POST">
                      @csrf
                      <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                      <button type="submit" class="btn btn-success mt-4 px-4 btn-block" onclick="return confirm('Yakin untuk checkout?')"> Checkout Now</button>
                  </form>
              </div>
            </div>
          </div>
        </section>
      </div>   
@endsection