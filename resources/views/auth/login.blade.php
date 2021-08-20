@extends('layouts.auth')

@section('content')

 <div class="content-login-auth mt-5">
      <div class="login-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img src="/images/banner_side_login.jpg" alt="" class="w-75 mb-4 mb-lg-none" />
            </div>
            <div class="col-lg-5">
              <img class="mb-5" src="/images/Logo Koperasi.svg" />
              <h3>
                Belanja menjadi mudah <br />
                Hanya Dengan <span>One Click. </span>
              </h3>
             <form method="POST" action="{{ route('login') }}" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="email" type="email" class="form-control rounded-pill w-75 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control rounded-pill w-75 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button
                            type="submit"
                            class="btn btn-success rounded-pill px-4 btn-block w-75 mt-4"
                        >
                            Sign In 
                        </button>
                        <a
                            href="{{ route('register') }}"
                            class="btn btn-signup btn-block w-75 mt-2"
                        >
                            Sign Up
                        </a>
                    </form>
          </div>
        </div>
      </div>
    </div>







@endsection
