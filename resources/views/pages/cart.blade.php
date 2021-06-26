@extends('layouts.app')

@section('title')
    Keranjang
@endsection

@section('content')
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <thead bgcolor="lightgreen">
                  <tr>
                    <td>Gambar</td>
                    <td>Nama Produk</td>
                    <td>Harga</td>
                    <td>Aksi</td>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $totalPrice = 0
                  @endphp
                  @foreach ($carts as $cart)
                    <tr>
                      <td style="width: 25%;">
                        @if ($cart->product->galleries)
                          <img
                            src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                            alt=""
                            class="cart-image w-100"
                          />
                        @endif
                      </td>
                      <td style="width: 35%;">
                        <div class="product-title">{{ $cart->product->name }}</div>
                        <div class="product-subtitle">by {{ $cart->product->user->store_name }}</div>
                      </td>
                        <td style="width: 35%;">
                        <div class="product-title">Rp. {{ number_format($cart->product->price) }}</div>
                        <div class="product-subtitle">IDR</div>
                      </td>
                      <td style="width: 20%;">
                        <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-remove-cart">
                                Batalkan
                            </button>
                        </form>
                      </td>
                    </tr>
                    @php
                        $totalPrice += $cart->product->price
                    @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Detail Pengiriman</h2>
            </div>
          </div>
          <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_one">Jalan</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_one"
                    name="address_one"
                    
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_two">Desa</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_two"
                    name="address_two"
                    
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="zip_code">Kode Pos</label>
                  <input
                    type="text"
                    class="form-control"
                    id="zip_code"
                    name="zip_code"
                    
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="country">Negara</label>
                  <input
                    type="text"
                    class="form-control"
                    id="country"
                    name="country"
                    value="Indonesia"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone_number">No.Handphone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phone_number"
                    name="phone_number"
                    
                  />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <hr />
              </div>
              <div class="col-12">
                <h2 class="mb-1">Informasi Pembayaran</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-4 col-md-2">
                <div class="product-title text-success">Rp. {{ number_format($totalPrice ?? 0) }}</div>
                <div class="product-subtitle">Total</div>
                <button
                  type="submit"
                  class="btn btn-success mt-4 px-4"
                >
                  Checkout
                </button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
            AOS.init();
            this.getProvincesData();
        },
        data: {
            provinces: null,
            regencies: null,
            provinces_id: null,
            regencies_id: null,
        },
        methods: {
            getProvincesData() {
                var self = this;
                axios.get('{{ route('api-provinces') }}')
                    .then(function(response) {
                        self.provinces = response.data;
                    });
            },
            getRegenciesData() {
                var self = this;
                axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function(response) {
                        self.regencies = response.data;
                    });
            },
        },
        watch: {
            provinces_id: function(val, oldVal) {
                this.regencies_id = null;
                this.getRegenciesData();
            }
        },
      });
    </script>
@endpush
