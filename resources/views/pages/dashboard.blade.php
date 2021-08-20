@extends('layouts.dashboard')

@section('title')
   Dashboard
@endsection


@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2>Dashboard</h2>
                <p class="text-muted">Look what you have made today!</p>
              </div>
              <div class="dashboard-content mt-4">
                <div class="row">
                  <div class="col-md-3">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="text-muted">Customer</div>
                        <h2>{{ number_format($customer) }}</h2>
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
                        <h2>{{ number_format($transaction_count) }}</h2>
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
          <div class="row mt-3">
        <div class="col-12 mt-2">
            <h2 class="mb-3">Transaksi terkini</h2>
            @foreach ($transaction_data as $transaction)
              <a
                href="{{ route('dashboard-transactions', $transaction->id) }}"
                class="card card-list d-block"
                >
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                            <img
                                src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                class="w-75"
                            />
                        </div>
                        <div class="col-md-4">
                                {{ $transaction->product->name ?? '' }}
                            </div>
                            <div class="col-md-3">
                                {{ $transaction->transaction->user->name ?? '' }}
                            </div>
                            <div class="col-md-3">
                        {{ $transaction->created_at->diffForHumans() }}
                            </div>
                            <div class="col-md-1 d-none d-md-block">
                                <img
                                    src="/images/dashboard-arrow-right.svg"
                                    alt=""
                                />
                        </div>
                    </div>
                </div>
            </a>  
            @endforeach
     </div>
    </div>
    </div>
</div>
</div>
@endsection