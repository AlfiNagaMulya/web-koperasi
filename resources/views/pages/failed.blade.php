@extends('layouts.success')

@section('title')
   Success Page
@endsection


@section('content')
   <div class="content-success mt-5">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/success.svg" alt="" class="mb-4" />
              <h2>Opps !</h2>
              <p>
                Transaksi Gagal !
              </p>
              <div>
                <a class="btn btn-success rounded-pill px-5 w-50 mt-4" href="/dashboard.html"> My Dashboard </a>
                <a class="btn btn-signup rounded-pill px-5 w-50 mt-2" href="/index.html"> Back To Home </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  

    
@endsection