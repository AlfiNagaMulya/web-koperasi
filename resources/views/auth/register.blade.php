  @extends('layouts.auth')

@section('content')

<div class="page-content page-auth py-5" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h3>
                        Memulai untuk jual beli <br />
                        dengan cara <span> New Way</span>
                    </h3>
                    <form class="mt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input 
                                v-model="name"
                                id="name" 
                                type="text" 
                                class="form-control rounded-pill px-4 @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autocomplete="name" 
                                autofocus
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input 
                                v-model="email"
                                @change="checkForEmailAvailability()"
                                id="email" 
                                type="email" 
                                class="form-control rounded-pill px-4 @error('email') is-invalid @enderror" 
                                :class="{ 'is-invalid': this.email_unavailable }"
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email"
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control rounded-pill px-4 @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                            >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input 
                                id="password-confirm" 
                                type="password" 
                                class="form-control rounded-pill px-4" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                            >
                        </div>
                        <div class="form-group">
                        <button
                            type="submit"
                            class="btn btn-success rounded-pill  btn-block mt-4"
                            :disabled="this.email_unavailable">
                            Daftar Sekarang
                        </button>
                        <a href="{{ route('login') }}" class="btn rounded-pill px-4 btn-signup btn-block mt-2">
                            Kembali Login
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
            checkForEmailAvailability: function () {
                var self = this;
                axios.get('{{ route('api-register-check') }}', {
                        params: {
                            email: this.email
                        }
                    })
                    .then(function (response) {
                        if(response.data == 'Available') {
                            self.$toasted.show(
                                "Email anda tersedia! Silahkan lanjut langkah selanjutnya!", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 3000,
                                }
                            );
                            self.email_unavailable = false;
                        } else {
                            self.$toasted.error(
                                "Hi, Email kamu sudah terdaftar !", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 3000,
                                }
                            );
                            self.email_unavailable = true;
                        }
                        // handle success
                        console.log(response.data);
                    })
            }
        },
        data() {
            return {
                name: "",
                email: "",
                email_unavailable: false
            }
        },
      });
    </script>
@endpush

