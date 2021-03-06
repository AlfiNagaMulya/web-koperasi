@extends('layouts.app')

@section('title')
   Category 
@endsection


@section('content')

    {{-- Categories --}}
    <section class="categories mt-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <button class="btn btn-danger rounded-pill" disabled>Top Featured</button>
            <h2 class="mt-3">Semua Kategori </h2>
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
              <button class="btn btn-danger rounded-pill" disabled>Top Products</button>
              <h2 class="pt-3">Semua  Product UMKM </h2>
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
                                    Rp. {{ $product->price }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div
                                class="col-12 text-center py-5"
                                data-aos="fade-up"
                                data-aos-delay="100"
                            >
                              Hmm..Belum ada product
                            </div>
                    @endforelse
            </div>
            <div class="row">
              <div class="col-12 mt-5 bg-light">
                {{  $products->links() }}
                
              </div>
            </div>
        </div>
      </section>
    </div>

    
@endsection