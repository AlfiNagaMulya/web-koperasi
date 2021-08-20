@extends('layouts.admin')

@section('title')
   Admin Dashboard
@endsection


@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2>Admin Dashboard</h2>
                <p class="text-muted">This Is Administrator</p>
              </div>
              <div class="dashboard-content mt-4">
                <div class="row">
                  <div class="col-md-3">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="text-muted">Customer</div>
                        <h2> {{ $customer }} </h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="text-muted">Pendapatan</div>
                        <h2>Rp {{ number_format($revenue) }}</h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="text-muted">Transaksi</div>
                        <h2>{{ number_format($transaction) }}</h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="text-muted">Total Pengunjung</div>
                        <h2>{{ 0 }}</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

          <section class="mychart mt-5">
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-5">
                  <h2 class="mt-3"> Kategori Diminati</h2>
                  <canvas class="mt-3" id="myChart" style="display: block; box-sizing: border-box; height: 460px; width: 460.5px;" width="921" height="920"></canvas>
                </div>
               
              </div>
            </div>

          </section>


@endsection