@extends('layouts.auth')

@section('title')
    Daftar
@endsection

@section('content')

    <div class="page-content page-auth" id="register">
      <section class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-4">
              <h2 class="text-success"> 
               Daftar
              </h2>
              <form method="POST" action="{{ route('register') }}" class="mt-3">
                @csrf
                <div class="form-group">
                  <label for="name">Nama Lengkap</label>
                  <input id="name"
                        
                        class="form-control @error('name') is-invalid @enderror"
                        name="name"
                        placeholder="Masukkan Nama"
                        required
                        autocomplete="name"
                        autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email"
                        
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        :class="{ 'is-invalid' : this.email_unavailable }"
                        name="email"
                        placeholder="Masukkan email"
                        required
                        autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        required
                        autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="password-confirm">Konfirmasi Password</label>
                  <input id="password-confirm"
                        type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation"
                        required
                        autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="store">Store</label>
                  <p class="text-muted">
                    Apakah anda menjual kaos disini?
                  </p>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="is_store_open"
                      id="openStoreTrue"
                      v-model="is_store_open"
                      :value="true"
                    />
                    <label for="openStoreTrue" class="custom-control-label">
                      Iya
                    </label>
                  </div>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="is_store_open"
                      id="openStoreFalse"
                      v-model="is_store_open"
                      :value="false"
                    />
                    <label for="openStoreFalse" class="custom-control-label">
                      Tidak
                    </label>
                  </div>
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label for="store_name">Nama Toko</label>
                  <input
                    id="store_name"
                    type="text"
                    v-model="store_name"
                    class="form-control @error('store_name') is-invalid @enderror"
                    name="store_name"
                    required
                    autocomplete
                    autofocus
                  />
                  @error('store_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label for="category">Kategori</label>
                  <select name="categories_id" id="category" class="form-control">
                    <option value="" disabled>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-success btn-block mt-4" :disabled="this.email_unavailable">
                  Daftar Sekarang
                </button>
                <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                  Kembali Login
                </a>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
        },
        methods: {
            checkForEmailAvailability: function() {
                var self = this;
                axios.get('{{ route('api-register-check') }}', {
                    params: {
                        email: this.email
                    }
                })
                    .then(function(response) {
                        if(response.data == 'Available') {
                            self.$toasted.show(
                                "Email anda tersedia! Silahkan lanjut langkah selanjutnya!",
                                {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );

                            self.email_unavailable = false;

                        } else {
                            self.$toasted.error(
                                "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                                {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );

                            self.email_unavailable = true;

                        }
                    });
            }
        },
        data() {
            return {
                name: "Lingga Wahyu R",
                email: "linggawahyurochim@gmail.com",
                is_store_open: true,
                store_name: "",
                email_unavailable: false
            }
        },
      });
    </script>
@endpush
