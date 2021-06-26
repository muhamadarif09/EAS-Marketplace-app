@extends('layouts.app')

@section('title')
    Produk
@endsection

@section('content')
    <div class="page-content page-home">
      

      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
            </div>
          </div>
          <div class="row">
            @php
              $incrementProduct = 0
            @endphp
            @forelse ($products as $product)
                <div
                    class="col-6 col-md-4 col-lg-3"
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementProduct += 100 }}"
                >
                    <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div
                            class="products-image"
                            style="
                                @if($product->galleries)
                                    background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                                @else
                                    background-color: #eee
                                @endif
                            "
                        ></div>
                        </div>
                        <div class="products-text">
                            {{ $product->name }}
                        </div>
                        <div class="products-price">
                        <div class="price text-success">Rp.{{ number_format($product->price) }}</div>
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
          <div class="row">
              <div class="col-12 mt-4">
                  {{ $products->links() }}
              </div>
          </div>
        </div>
      </section>
    </div>
@endsection
