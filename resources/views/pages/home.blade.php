@extends('layouts.app')

@section('title')
Koperasi Lumbung Indonesia Sukses
@endsection


@section('content')
  
  {{-- Banner --}}
    <div class="page-content page-home mt-5">
      <section class="banner-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li class="active" data-target="#bannerCarousel" data-slide-to-0></li>
                  <li data-target="#bannerCarousel" data-slide-to-1></li>
                  <li data-target="#bannerCarousel" data-slide-to-2></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/images/banner.jpg" alt="carousel image" class="d-block w-100" />
                  </div>
                  <div class="carousel-item">
                    <img src="/images/banner.jpg" alt="carousel image" class="d-block w-100" />
                  </div>
                  <div class="carousel-item">
                    <img src="/images/banner.jpg" alt="carousel image" class="d-block w-100" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>


    {{-- Networking --}}
     <section class="networking">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <h2>Our Network</h2>
            <p>
              Kami telah membangun jaringan dengan berbagai <br />
              Perusahaan & Koperasi besar di Indonesia
              <img src="/images/Networking.svg" alt="" />
            </p>
          </div>
        </div>
      </div>
    </section>



    {{-- Categories --}}
    <section class="categories mt-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <button class="btn btn-danger rounded-pill" disabled>Top Featured</button>
            <h2 class="mt-3">Kategori Produk </h2>
          </div>
        </div>
        <div class="row mt-5">
          @php $incrementCategory = 0 @endphp
          @forelse ($categories as $category )
            
          <div class="col-6 col-md-3"data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}" >
            <a href="{{ route('categories-detail', $category->slug ) }}" class="component-categories d-block">
              <div class="categories-image text-center">
                <img src="{{ Storage::url($category->photo) }}" alt="" class="w-50"  />
              </div>
              <p class="categories-text">{{ $category->name }}</p>
            </a>
          </div>
          @empty  
          <div class="col-12 text-center py-5"  data-aos="fade-up" data-aos-delay="100">
            No Categories Found
            </div> 
      @endforelse
        </div>
      </div>
    </section>


    {{-- Prodduct Home  --}}
    <section class="products mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <button class="btn btn-danger rounded-pill" disabled>Top Foods</button>
              <h2 class="pt-3"> Produk UMKM Bandung </h2>
            </div>
          </div>
            <div class="row mt-5">
                    @php $incrementProduct = 0 @endphp
                    @forelse ($products as $product)
                        <div
                        class="col-6 col-md-4 col-lg-3"
                        data-aos="fade-up"
                        data-aos-delay="{{  $incrementProduct += 100 }}"
                        >
                            <a href="{{ route('details', $product->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div
                                    class="products-image"
                                    style="
                                        @if($product->galleries->count())
                                            background-image: url('{{ storage::url($product->galleries->first()->photos) }}');
                                        @else
                                            background-color: #eee;
                                        @endif
                                    "
                                    ></div>
                                </div>
                                <div class="products-text">
                                    {{  $product->name }}
                                </div>
                                <div class="products-price">
                                    Rp {{ number_format($product->price) }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div
                                class="col-12 text-center py-5"
                                data-aos="fade-up"
                                data-aos-delay="100"
                            >
                                No Products Found
                            </div>
                    @endforelse
                </div>
        </div>
      </section>
    </div>
@endsection