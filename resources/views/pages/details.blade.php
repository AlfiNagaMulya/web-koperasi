@extends('layouts.app')

@section('title')
   Details 
@endsection


@section('content')

    <!-- Content -->
    <div class="details mt-5">
      <section class="header-breadcrumbs" data-aos="fade-down"
        data-aos-delay="100">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    product Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
    

   <!-- Gallery -->
    <section class="gallery mb-3" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" >
              <transition name="slide-fade" mode="out-in">
                <img :key="photos[activePhoto].id" :src="photos[activePhoto].url"class="w-100 main-image"alt=""/>
              </transition>
            </div>
            <div class="col-lg-3">
              <div class="row">
                <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos":key="photo.id" >
                  <a href="#" @click="changeActive(index)">
                    <img :src="photo.url" class="w-100 thumbnail-image" :class="{ active: index == activePhoto }" alt="" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      </div>

    <!-- Description -->
      <div class="description mt-4"  data-aos="fade-up">
        <section class="heading-details">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
               <h1>{{ $product->name }}</h1>
                <div class="owner pt-2">By {{  $product->user->store_name }} </div>
                <div class="price pt-3">Rp {{ number_format($product->price) }}</div>
              </div>
              <div class="col-lg-3" data-aos="zoom-in">
                @auth
                    <form action="{{ route('details-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <button
                        type="submit"
                        class="btn btn-success rounded-pill px-4 text-white btn-block mb-3"
                      >
                        Tambahkan ke keranjang
                      </button>
                    </form>
                @else
                    <a
                      href="{{ route('login') }}"
                      class="btn rounded-pill btn-success px-4 text-white btn-block mb-3"
                    >
                    Login dulu ya

                    </a>
                @endauth
              </div>
            </div>
          </div>
        </section>

          <!-- Detail Description -->
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                {!! $product->description !!}
              </div>
            </div>
          </div>
        </section>

        <!-- Testimonials -->
        <section class="Testimonials mt-5">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Happy Testimonials (2)</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                  <li class="media">
                    <img src="/images/icons-testimonial-2.png"class="mr-3 rounded-circle" width="50px" alt=""/>
                    <div class="media-body">
                      <h6 class="mt-2 mb-1">Anisa Novianti Gunawan</h6>
                     <p> 
                         Bikin ketagihan pokonya mah, sukses terus produk dapoer pokyull
                      </p>  
                      
                    </div>
                  </li>
                  <li class="media my-3">
                    <img src="/images/icons-testimonial-2.png"class="mr-3 rounded-circle" width="50px" alt=""/>
                    <div class="media-body">
                      <h6 class="mt-2 mb-1">Vina S</h6>
                      <p>
                          Mantul pisan Basreng na , udah beli ke 3x kalinya.. hhee 
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    
@endsection




@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            @foreach ($product->galleries as $gallery)
            {
              id: {{ $gallery->id }},
              url: "{{ Storage::url($gallery->photos) }}",
            },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush