@extends('layouts.dashboard')

@section('title')
    Transaksi Detail
@endsection

@section('content')
        <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title text-success">{{ $transaction->code }}</h2>
                <p class="dashboard-subtitle">Detail Transaksi</p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-4">
                            <img
                              src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                              alt=""
                              class="w-100 mb-3"
                            />
                          </div>
                          <div class="col-12 col-md-8">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Nama Pembeli</div>
                                <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Nama Produk</div>
                                <div class="product-subtitle">
                                  {{ $transaction->product->name }}
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  Waktu Transaksi
                                </div>
                                <div class="product-subtitle">
                                  {{ $transaction->created_at }}
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Status Pembayaran</div>
                                <div class="product-subtitle text-success">
                                  Sudah Bayar
                                 
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Total</div>
                                <div class="product-subtitle">{{ number_format($transaction->transaction->total_price) }}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">No.Handphone</div>
                                <div class="product-subtitle">
                                  {{ $transaction->transaction->user->phone_number }}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <form action="{{ route('dashboard-transaction-update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="col-12 mt-4">
                              <h5 class="text-success">Informasi Pengiriman</h5>
                            </div>
                            <div class="col-12">
                              <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Jalan</div>
                                  <div class="product-subtitle">
                                    {{ $transaction->transaction->user->address_one }}
                                  </div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Desa</div>
                                  <div class="product-subtitle">
                                    {{ $transaction->transaction->user->address_two }}
                                  </div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Kode Pos</div>
                                  <div class="product-subtitle">{{ $transaction->transaction->user->zip_code }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Negara</div>
                                  <div class="product-subtitle">{{ $transaction->transaction->user->country }}</div>
                                </div>
                                <div class="col-12 col-md-3">
                                  <div class="product-title">Status Pengiriman</div>
                                  <select
                                    name="shipping_status"
                                    id="status"
                                    class="form-control"
                                    v-model="status"
                                  >
                                    <option value="PENDING">Tertunda</option>
                                    <option value="SHIPPING">Dikirim</option>
                                    <option value="SUCCESS">Berhasil</option>
                                  </select>
                                </div>
                                <template v-if="status == 'SHIPPING'">
                                  <div class="col-md-3">
                                    <div class="product-title">Input Resi</div>
                                    <input
                                      type="text"
                                      name="resi"
                                      class="form-control"
                                      v-model="resi"
                                    />
                                  </div>
                                  <div class="col-md-2">
                                    <button
                                      type="submit"
                                      class="btn btn-success btn-block mt-4"
                                    >
                                      Update Resi
                                    </button>
                                  </div>
                                </template>
                              </div>
                            </div>
                          </div>
                          <div class="row mt-4">
                            <div class="col-12 text-right">
                              <button
                                type="submit"
                                class="btn btn-success btn-lg"
                              >
                                Simpan
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
          status: "{{ $transaction->shipping_status }}",
          resi: "{{ $transaction->resi }}",
        },
      });
    </script>
@endpush
