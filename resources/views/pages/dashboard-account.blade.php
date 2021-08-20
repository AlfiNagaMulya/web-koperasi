@extends('layouts.dashboard')

@section('title')
   Dashboard Account
@endsection


@section('content')

   <div
            class="section-content section-dashboard-home"
            data-aos="fade-up" >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 >Akun Saya</h2>
                <p class="dashboard-subtitle">
                  Update your current profile
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form id="locations" action="{{ route('dashboard-settings-redirect','dashboard-settings') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Nama Kamu</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  name="name"
                                  value="{{ $user->name }}" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  name="email"
                                  value="{{ $user->email }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address_one">Alamat 1</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="address_one"
                                  name="address_one"
                                  value="{{ $user->address_one }}" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address_two">Alamat 2</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="address_two"
                                  name="address_two"
                                  value="{{ $user->address_two }}" />
                              </div>
                            </div>
                        
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="provinces_id">Provinsi</label>
                                <select
                                  name="provinces_id"
                                  id="provinces_id"
                                  class="form-control"
                                  >
                                  <option value="{{ $user->provinces_id }}">Jawa Barat</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="regencies_id">Kota</label>
                                <select
                                  name="regencies_id"
                                  id="regencies_id"
                                  class="form-control"
                                  >
                               <option value="{{ $user->regencies_id }}">Bandung</option>

                                  {{-- <option value="{{ $user->regencies_id }}">Kabupaten Bandung</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Bekasi</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Bogor</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Ciamis</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Cirebon</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Garut</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Cianjur</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Indramayu</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Karawang</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Kuningan</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Pangandaran</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Purwakarta</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Subang</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Sukabumi</option>
                                  <option value="{{ $user->regencies_id }}">Kabupaten Sumedang</option>
                                  <option value="{{ $user->regencies_id }}">Kota Bandung</option>
                                  <option value="{{ $user->regencies_id }}">Kota Banjar</option>
                                  <option value="{{ $user->regencies_id }}">Kota Bekasi</option>
                                  <option value="{{ $user->regencies_id }}">Kota Cimahi</option>
                                  <option value="{{ $user->regencies_id }}">Kota Cirebon</option>
                                  <option value="{{ $user->regencies_id }}">Kota Depok</option>
                                  <option value="{{ $user->regencies_id }}">Kota Sukabumi</option>
                                  <option value="{{ $user->regencies_id }}">Kota Tasikmalaya</option> --}}
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="zip_code">Kode Pos</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="zip_code"
                                  name="zip_code"
                                  value="{{ $user->zip_code }}"/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="country">Negara</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="country"
                                  name="country"
                                  value="{{ $user->country }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="phone_number">Nomor Handphone</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="phone_number"
                                  name="phone_number"
                                  value="{{ $user->phone_number }}"/>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <button
                                type="submit"
                                class="btn btn-success rounded-pill px-5">
                                Simpan
                              </button>
                            </div>
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

