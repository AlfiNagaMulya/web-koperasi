@extends('layouts.admin')

@section('title')
  Store Settings
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 >Kategori</h2>
        <p class="dashboard-subtitle">
            Create New Category
        </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12 ">
          @if ($errors->any())
              <div class=" alert alert-danger text-bold ">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <h3>{{ $error }}</h3>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" class="form-control" name="name" required />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" class="form-control" name="photo" placeholder="Photo" required />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col mt-4 ">
                    <button
                      type="submit"
                      class="btn rounded-pill  btn-success px-5"
                    >
                      Simpan
                    </button>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection