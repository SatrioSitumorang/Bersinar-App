    @extends('layouts.admin.template')
    @section('content')
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Tambah Barang</h5>
            </div>
            <div class="container mt-3 mx-auto">
                <div class="row">
                    <div class="d-lg-flex">
                        <ul class="nav nav-tabs nav-tabs-vertical nav-tabs-vertical-start wmin-lg-200 me-lg-3 mb-3 mb-lg-0">
                            <li class="nav-item">
                                <a href="#vertical-left-tab1" class="nav-link active" data-bs-toggle="tab">
                                    {{-- <i class="ph-user-circle me-2"></i> --}}
                                    Nama dan Keterangan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#vertical-left-tab2" class="nav-link" data-bs-toggle="tab">
                                    {{-- <i class="ph-currency-circle-dollar me-2"></i> --}}
                                    Persediaan Barang
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#vertical-left-tab3" class="nav-link" data-bs-toggle="tab">
                                    {{-- <i class="ph-shopping-cart me-2"></i> --}}
                                    Harga Barang
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content flex-lg-fill">
                            <div class="tab-pane fade show active" id="vertical-left-tab1">
                                <form action="#">
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Kode Barang:</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" placeholder="Masukkan Kode Barang">
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Nama Barang:</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama Barang">
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Kategori Barang:</label>
                                        <div class="col-lg-7">
                                            <div class="input-group">
                                                <select data-placeholder="Pilih Kategori Barang" class="form-control select"
                                                    data-width="1%">
                                                    <option></option>
                                                    <option value="1">Mudah Pecah</option>
                                                    <option value="2">Simpan di suhu rendah</option>
                                                    <option value="3">Rupiah</option>
                                                </select>
                                                <button type="button" class="btn btn-primary "><i
                                                        class="ph-plus-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Satuan Barang:</label>
                                        <div class="col-lg-7">
                                            <div class="input-group">
                                                <select data-placeholder="Pilih Kategori Barang" class="form-control select"
                                                    data-width="1%">
                                                    <option></option>
                                                    <option value="1">Mudah Pecah</option>
                                                    <option value="2">Simpan di suhu rendah</option>
                                                    <option value="3">Rupiah</option>
                                                </select>
                                                <button type="button" class="btn btn-primary "><i
                                                        class="ph-plus-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Spesifikasi:</label>
                                        <div class="col-lg-7">
                                            <textarea rows="3" cols="3" class="form-control" placeholder="Masukkan Spesifikasi"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Barcode Barang:</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" placeholder="Masukkan Kode Barang">
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Gambar Barang:</label>
                                        <div class="col-lg-7">
                                            <img id="preview" src="#" alt="Preview"
                                                style="display: none; max-width: 200px; max-height: 200px;">
                                            <input type="file" class="form-control" name="company_logo" id="company_logo"
                                                onchange="previewImage(this);">
                                            <div class="form-text text-muted">Format File: (*.jpg, *.jpeg, *.png) (Max 2MB)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Keterangan:</label>
                                        <div class="col-lg-7">
                                            <textarea rows="3" cols="3" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-11 text-end mb-5">
                                            <button type="submit" class="btn btn-primary">Simpan<i
                                                    class="ph-check-circle ms-1"></i></button>
                                            <button type="reset" class="btn btn-danger">Batal<i
                                                    class="ph-x-circle ms-1"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="vertical-left-tab2">
                                <form action="#">
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Batas Re-Order:</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan Batas Re-Order Barang">
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Minimum Order:</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan Minimum Order Barang">
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label class="col-lg-3 col-form-label">Jumlah Stok Awal:</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan Jumlah Stok Awal Barang">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-11 text-end mb-5">
                                            <button type="submit" class="btn btn-primary">Simpan<i
                                                    class="ph-check-circle ms-2"></i></button>
                                            <button type="reset" class="btn btn-danger">Batal<i
                                                    class="ph-x-circle ms-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="vertical-left-tab3">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Harga Pembelian</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex justify-content-end mb-2">
                                                    <a class="btn btn-primary" href="#"><i
                                                            class="ph-plus-circle"></i><span
                                                            class="d-none d-lg-inline-block ms-2">Tambah Harga</span></a>
                                                </div>
                                                {{-- <div class="row"> --}}
                                                {{-- <div class="col-lg-12"> --}}
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mt-2">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>Jenis Nasabah</th>
                                                                <th>Ada Harga</th>
                                                                <th>Range Awal</th>
                                                                <th>Range Akhir</th>
                                                                <th>Satuan</th>
                                                                <th>Harga</th>
                                                                <th>Default</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            <tr>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <select data-placeholder="Jenis Nasabah"
                                                                            class="form-control select">
                                                                            <option></option>
                                                                            <option value="1">Reguler</option>
                                                                            <option value="2">Prioritas</option>
                                                                            <option value="3">VVIP</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="cc_li_c">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control text-center"
                                                                        placeholder="0">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control text-center"
                                                                        placeholder="0">
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <select data-placeholder="Satuan"
                                                                            class="form-control select">
                                                                            <option></option>
                                                                            <option value="1">tes1</option>
                                                                            <option value="2">tes2</option>
                                                                            <option value="3">tes3</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control text-center"
                                                                        placeholder="0">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="cc_li_c">
                                                                </td>
                                                                <td>
                                                                    <a class="badge bg-danger" href="#"><i
                                                                            class="ph ph-x-circle"></i><span
                                                                            class="d-none d-sm-inline-block"></span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- </div> --}}
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Harga Penjualan</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="d-flex justify-content-end mb-2">
                                                            <a class="btn btn-primary" href="#"><i
                                                                    class="ph-plus-circle"></i><span
                                                                    class="d-none d-lg-inline-block ms-2">Tambah
                                                                    Harga</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mt-2">
                                                                <div class="row">
                                                                    <thead class="text-center">
                                                                        <tr>
                                                                            <th class="col-md-3">Satuan</th>
                                                                            <th class="col-md-3">Harga</th>
                                                                            <th class="col-md-3">Default</th>
                                                                            <th class="col-md-3">Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                </div>
                                                                <tbody class="text-center">
                                                                    <tr>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <select data-placeholder="Satuan"
                                                                                    class="form-control select">
                                                                                    <option></option>
                                                                                    <option value="1">tes1</option>
                                                                                    <option value="2">tes2</option>
                                                                                    <option value="3">tes3</option>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"
                                                                                class="form-control text-center"
                                                                                placeholder="0">
                                                                        </td>
                                                                        <td>
                                                                            <input type="checkbox"
                                                                                class="form-check-input" id="cc_li_c">
                                                                        </td>
                                                                        <td>
                                                                            <a class="badge bg-danger" href="#"><i
                                                                                    class="ph ph-x-circle"></i><span
                                                                                    class="d-none d-sm-inline-block"></span></a>
                                                                        </td>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-end mb-5">
                                        <button type="submit" class="btn btn-primary">Simpan<i
                                                class="ph-check-circle ms-2"></i></button>
                                        <button type="reset" class="btn btn-danger">Batal<i
                                                class="ph-x-circle ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /basic layout -->
        {{-- <script src="{{ asset('admin_resources/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
        <script src="{{ asset('admin_resources/assets/demo/pages/form_select2.js') }}"></script> --}}
    @endsection
