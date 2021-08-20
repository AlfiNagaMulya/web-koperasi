@extends('layouts.dashboard')

@section('title')
    Store Dashboard Transaction Detail
@endsection

@section('content')
<!-- Section Content -->



<div
  class="section-content section-dashboard-home mb-4"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 >#{{ $transaction->code }}</h2>
      <p class="dashboard-subtitle">
        Transaksi Details
      </p>
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
                    class="w-100 mb-3"
                    alt=""
                  />
                </div>
                <div class="col-12 col-md-8">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Nama Customer</div>
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
                        Tanggal Transaksi & Waktu
                      </div>
                      <div class="product-subtitle">
                        {{ $transaction->created_at->isoFormat('dddd, D MMM Y')  }} ,
                        {{ $transaction->created_at->diffForHumans() }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Status Pembayaran</div>
                      <div class="product-subtitle text-danger">
                     <strong> {{ $transaction->transaction->transaction_status }}  </strong>      
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Total 
                      </div>
                      <div class="product-subtitle">
                        Rp {{ number_format($transaction->transaction->total_price) }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Nomor Handphone
                      </div>
                      <div class="product-subtitle">
                        {{ $transaction->transaction->user->phone_number }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <form action="{{ route('dashboard-transactions-update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12 mt-4">
                    <h3  style="font-weight: 700">Informasi Pengiriman</h3>
                  </div>
                  <div class="col-12 mt-3">
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="product-title">Alamat I</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->address_one }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Alamat II</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->address_two }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Provinsi</div>
                        <div class="product-subtitle">
                         Jawa Barat
                         </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Kota</div>
                        <div class="product-subtitle">
                         Bandung
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">kode</div>
                        <div class="product-subtitle">{{ $transaction->transaction->user->zip_code }}</div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Negara</div>
                        <div class="product-subtitle">Indonesia</div>
                      </div>
                      <div class="col-12 col-md-3">
                        <div class="product-title">Status Pengiriman</div>
                        <select
                          name="shipping_status"
                          id="status"
                          class="form-control"
                          v-model="status"
                        >
                          <option value="PENDING">Pending</option>
                          <option value="SHIPPING">Shipping</option>
                          <option value="SUCCESS">Success</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-3 text-center">
                        <div class="product-title ">Ekspedisi Pengiriman</div>
                          <a href=" "> <img src="/images/J&t.png" class=" text-left mt-2" width="50%" alt="">   </a>  
                      </div>
                      <template v-if="status == 'SHIPPING'">
                        <div class="col-md-3">
                          <div class="product-title">Input Resi</div>
                          <input
                            type="text"
                            class="form-control"
                            name="resi"
                            v-model="resi"
                          />
                        </div>
                        <div class="col-md-2">
                          <button
                            type="submit"
                            class="btn rounded-pill px-4 btn-success btn-block mt-4"
                          >
                            Update Resi
                          </button>
                        </div>
                      </template>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mt-5">
                    <h3 style="font-weight: 700">
                      Waktu dan Ketentuan Pengiriman
                    </h3>
                  </div>
                    <div class="col-12 mt-3">
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="product-title"> Batas Waktu Pengiriman</div>
                        <div class="product-subtitle">
                          4 Hari (Setelah Pembayaran)
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Waktu Max Produk diterima</div>
                        <div class="product-subtitle">
                          7 Hari 
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Cek Resi</div>
                        <div class="product-subtitle pt-2">
                          <button class="btn btn-outline-danger "> <a href="https://jet.co.id/track" class="text-dark " style="text-decoration: none"  > Cek Resi J&T Express </a> </button>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Kondisi Produk</div>
                        <div class="product-subtitle">
                         <strong> BARU</strong> 
                         </div>
                      </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12 ">
                    <button
                      type="submit"
                      class="btn rounded-pill px-3 btn-success btn-lg mt-4"
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



<script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?72521';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
  "enabled":true,
  "chatButtonSetting":{
      "backgroundColor":"#4dc247",
      "ctaText":"Hubungi kami  ",
      "borderRadius":"25",
      "marginLeft":"0",
      "marginBottom":"50",
      "marginRight":"50",
      "position":"right"
  },
  "brandSetting":{
      "brandName":"Admin Lumbung Indonesia",
      "brandSubTitle":"",
      "brandImg":"",
      "welcomeText":"Hai !\n\nAda yang bisa kami bantu ?\n",
      "messageText":"Assalamualaikum.",
      "backgroundColor":"#0a5f54",
      "ctaText":"Chat Sekarang yuk",
      "borderRadius":"25",
      "autoShow":true,
      "phoneNumber":"6283829559783"
  }
};
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>