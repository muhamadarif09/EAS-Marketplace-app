@extends('layouts.dashboard')

@section('title')
    Pengaturan Akun
@endsection

@section('content')
  <div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
  >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Akun Saya</h2>
        <p class="dashboard-subtitle">Perbarui profil Anda saat ini </p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account') }}" method="POST" enctype="multipart/form-data" id="locations">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Nama</label>
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          name="name"
                          value="{{ $user->name }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          value="{{ $user->email }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="addressOne">Jalan</label>
                        <input
                          type="text"
                          class="form-control"
                          id="address_one"
                          name="address_one"
                          value="{{ $user->address_one }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="addressTwo">Desa</label>
                        <input
                          type="text"
                          class="form-control"
                          id="address_two"
                          name="address_two"
                          value="{{ $user->address_two }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="postalCode">Kode Pos</label>
                        <input
                          type="text"
                          class="form-control"
                          id="zip_code"
                          name="zip_code"
                          value="{{ $user->zip_code }}"
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
                          value="{{ $user->country }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="mobile">No.Handphone</label>
                        <input
                          type="text"
                          class="form-control"
                          id="phone_number"
                          name="phone_number"
                          value="{{ $user->phone_number }}"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button
                        type="submit"
                        class="btn btn-success px-5"
                      >
                        Simpan
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
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
