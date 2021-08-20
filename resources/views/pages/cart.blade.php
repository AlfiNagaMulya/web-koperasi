@extends('layouts.app')

@section('title')
   Cart
@endsection


@section('content')

    <div class="content-cart mt-5">

    <!-- Breadcrumbs -->
      <section class="header-breadcrumbs">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                   Keranjang
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

   <!-- Content Cart -->
    <div class="content-cart">
      <section class="cart">
        <div class="container">
          <div class="row">
             <div class="col-12">
              <h2 class="mb-4">Support UMKM Dengan Belanja</h2>
            </div>
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart" aria-describedby="Cart">
                <thead>
                  <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama &amp; UMKM</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>
             @php $totalPrice = 0; 
             $pajak = 0;
             @endphp
                  @foreach ($carts as $cart)
                    <tr>
                      <td style="width: 20%;">
                        @if($cart->product->galleries)
                          <img
                            src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                            alt=""
                            class="cart-image"
                          />
                        @endif
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">{{  $cart->product->name }}</div>
                      <div class="product-subtitle">by {{  $cart->product->user->store_name }}</div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">Rp {{ number_format($cart->product->price) }}</div>
                      <div class="product-subtitle">Rupiah</div>
                    </td>
                    <td style="width: 20%;">
                      <form action="{{  route('cart-delete', $cart->id) }}" method="POST" >
                        @method('DELETE')
                        @csrf
                         <button type="submit" class="btn rounded-pill px-4  btn-remove-cart">
                        Hapus
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
          <div class="row"  data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Alamat Pengiriman</h2>
            </div>
          </div>
             <form action="{{ route('checkout') }}" id="locations"  method="POST" enctype="multipart/form-data">
            @csrf
            
          <div class="row mb-2 " data-aos="fade-up" data-aos-delay="200"  >
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_one">Alamat I</label>
                <input
                  type="text"
                  class="form-control  rounded-pill px-4"id="address_one" aria-describedby="" name="" value=""/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label for="address_two">Alamat II</label>
                <input
                  type="text"
                  class="form-control rounded-pill px-4"id="address_two" aria-describedby="" name="" value=""/>
              </div>
            </div>
                      <div class="col-md-4">
              <div class="form-group">
                <label for="provinces_id">Provinsi</label>
                <select name="provinces_id" id="provinces_id" class="form-control rounded-pill px-4">
                  <option value="West Java">Jawa Barat</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="regencies_id">Kota</label>
                <select name="regencies_id" id="regencies_id" class="form-control rounded-pill px-4">
                 <option value="Bandung">Bandung</option>
                </select>
              </div>
            </div>
                 <div class="col-md-4">
              <div class="form-group">
                <label for="zip_code">Kode Pos</label>
                <input
                  type="text" 
                  class="form-control rounded-pill px-4"
                  id="zip_code"
                  name="zip_code"
                  value=""
                />
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Negara</label>
                <input
                  type="text"
                  class="form-control rounded-pill px-4"
                  id="country"
                  name="country"
                  value="Indonesia"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone_number">Nomor Handphone</label>
                <input
                  type="text"
                  class="form-control rounded-pill px-4 "
                  id="phone_number"
                  name="phone_number"
                  value=""
                />
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150" >
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2>Informasi Pembayaran</h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200" >
            <div class="col-4 col-md-2">
               <div class="product-title"> <?php
                $pajak = $totalPrice * (40/100);
                $total_all = $pajak + $totalPrice;
                echo "Rp. ".number_format($pajak ?? 0);
               ?> </div>
              <div class="product-subtitle">Pajak (10%) </div>
            </div>
            <div class="col-4 col-md-2">
               <div class="product-title"><img src="/images/J&t.png" class=" text-left " width="50%" alt=""> </div>
              <div class="product-subtitle">Ekspedisi Pengiriman </div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title text-success">Rp <strong> {{ number_format($total_all ?? 0) }}  </strong> </div>
              <div class="product-subtitle">Total Keseluruhan</div>
              <input type="hidden" name="total_price" value="{{ $total_all }}">
            </div>
            <div class="col-8 col-md-4">
              <button type="submit"
                 class="btn btn-success rounded-pill px-5 mt-3   btn-block">
                Checkout Sekarang
              </button>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection

