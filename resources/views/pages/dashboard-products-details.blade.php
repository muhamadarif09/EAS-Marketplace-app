@extends('layouts.dashboard')

@section('title')
    Edit Produk
@endsection

@section('content')
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Edit Produk</h2>
      
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{ route('dashboard-product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="product">Nama Produk</label>
                      <input
                        type="text"
                        name="name"
                        id="product"
                        class="form-control"
                        value="{{ $product->name }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="price">Harga</label>
                      <input
                        type="number"
                        name="price"
                        id="price"
                        class="form-control"
                        value="{{ $product->price }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="category">Kategori</label>
                      <select
                        name="categories_id"
                        id="category"
                        class="form-control"
                      >
                        @foreach ($categories as $category)
                          @if ($category->id == $product->categories_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                          @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Deskripsi Produk</label>
                      <textarea name="description" id="editor">{!! $product->description !!}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5 btn-block"
                    >
                      Simpan
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                @foreach ($product->galleries as $gallery)
                  <div class="col-md-4">
                    <div class="gallery-container">
                      <img src="{{ Storage::url($gallery->photos ?? '') }}" alt="" class="w-100">
                      <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}" class="delete-gallery">
                        <img src="/images/icon-delete.svg" alt="">
                      </a>
                    </div>
                  </div>
                @endforeach
                <div class="col-12">
                  <form action="{{ route('dashboard-product-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="products_id" value="{{ $product->id }}">
                    <input type="file" name="photos" id="file" style="display: none;" onchange="form.submit()">
                    <button type="button" class="btn btn-secondary btn-block mt-3" onclick="thisFileUpload()">
                      Tambah Foto
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
      CKEDITOR.replace("editor");
    </script>
@endpush
