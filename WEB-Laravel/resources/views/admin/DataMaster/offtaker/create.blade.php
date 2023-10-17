@extends('layouts.admin.template')
@section('content')
    <!-- Basic layout -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Offtaker</h5>
        </div>
        <div class="container mt-3 mx-auto">
            <div class="row">
                <div class="d-lg-flex">
                    <ul class="nav nav-tabs nav-tabs-vertical nav-tabs-vertical-start wmin-lg-200 me-lg-3 mb-3 mb-lg-0">
                        <li class="nav-item">
                            <a href="#vertical-left-tab1" class="nav-link active" data-bs-toggle="tab">
                                {{-- <i class="ph-user-circle me-2"></i> --}}
                                Data Pribadi Offtaker
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#vertical-left-tab2" class="nav-link" data-bs-toggle="tab">
                                {{-- <i class="ph-currency-circle-dollar me-2"></i> --}}
                                Alamat Offtaker
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#vertical-left-tab3" class="nav-link" data-bs-toggle="tab">
                                {{-- <i class="ph-shopping-cart me-2"></i> --}}
                                Rekening Offtaker
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#vertical-left-tab4" class="nav-link" data-bs-toggle="tab">
                                {{-- <i class="ph-shopping-cart me-2"></i> --}}
                                Rincian Barang Offtaker
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content flex-lg-fill">
                        <div class="tab-pane fade show active" id="vertical-left-tab1">
                            <form action="#">
                                {{-- <div class="row mb-3">
                                    <label class="col-lg-4 col-form-label d-flex justify-content-center">Data Pribadi
                                        Offtaker</label>
                                </div> --}}
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Kategori Offtaker:</label>
                                    <div class="col-lg-7">
                                        <div class="input-group">
                                            <select data-placeholder="Pilih Kategori Offtaker" class="form-control select"
                                                data-width="1%">
                                                <option></option>
                                                <option value="1">Reguler</option>
                                                <option value="2">Prioritas</option>
                                                <option value="3">VVIP</option>
                                            </select>
                                            <button type="button" class="btn btn-primary "><i
                                                    class="ph-plus-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Kode Offtaker:</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="Kode Offtaker">
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Nama Ofttaker:</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Offtaker">
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Email:</label>
                                    <div class="col-lg-7">
                                        <input type="email" class="form-control" placeholder="Masukkan Email">
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Nomor Telepon Kantor/Rumah:</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control"
                                            placeholder="Masukkan Nomor Telepon Kantor">
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Nomor Telepon Seluler:</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control"
                                            placeholder="Masukkan Nomor Telepon Seluler">
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Nomor WhatsApp:</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="Masukkan Nomor WhatsApp">
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Kontak Person:</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control"
                                            placeholder="Masukkan Nomor Kontak Person">
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
                        <div class="tab-pane fade" id="vertical-left-tab2">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mb-5">
                                    <h6>Alamat Offtaker</h6>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal_default_tab2"><i class="ph-plus-circle"></i><span
                                                class="d-none d-lg-inline-block ms-2">Tambah Alamat</span></button>
                                    </div>
                                    <div id="modal_default_tab2" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Alamat</h5>
                                                    {{-- <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button> --}}
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Provinsi:</label>
                                                            <div class="col-lg-7">
                                                                <div class="input-group">
                                                                    <select data-placeholder="Pilih Provinsi"
                                                                        class="form-control select" data-width="1%">
                                                                        <option></option>
                                                                        <option value="1">Sumatera Utara</option>
                                                                        <option value="2">DKI Jakarta</option>
                                                                        <option value="3">NTB</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Kabupaten:</label>
                                                            <div class="col-lg-7">
                                                                <div class="input-group">
                                                                    <select data-placeholder="Pilih Kabupaten"
                                                                        class="form-control select" data-width="1%">
                                                                        <option></option>
                                                                        <option value="1">Sumatera Utara</option>
                                                                        <option value="2">DKI Jakarta</option>
                                                                        <option value="3">NTB</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Kecamatan:</label>
                                                            <div class="col-lg-7">
                                                                <div class="input-group">
                                                                    <select data-placeholder="Pilih Kecamatan"
                                                                        class="form-control select" data-width="1%">
                                                                        <option></option>
                                                                        <option value="1">Sumatera Utara</option>
                                                                        <option value="2">DKI Jakarta</option>
                                                                        <option value="3">NTB</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Desa:</label>
                                                            <div class="col-lg-7">
                                                                <div class="input-group">
                                                                    <select data-placeholder="Pilih Desa"
                                                                        class="form-control select" data-width="1%">
                                                                        <option></option>
                                                                        <option value="1">Sumatera Utara</option>
                                                                        <option value="2">DKI Jakarta</option>
                                                                        <option value="3">NTB</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Alamat Detail:</label>
                                                            <div class="col-lg-7">
                                                                <textarea rows="3" cols="3" class="form-control"
                                                                    placeholder="Masukkan Alamat Detail (Cth: Jalan, Nomor Rumah, Block, dll)"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">RT/RW:</label>
                                                            <div class="col-lg-2">
                                                                <input type="text" class="form-control text-center"
                                                                    placeholder="RT">
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <input type="text" class="form-control text-center"
                                                                    placeholder="RW">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-lg-4 col-form-label">Atur Sebagai:</label>
                                                            <div class="col-lg-3">
                                                                <input type="checkbox"
                                                                    class="form-check-input form-check-input" unchecked>
                                                                <span class="form-check-label">Alamat Kantor</span>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <input type="checkbox"
                                                                    class="form-check-input form-check-input" unchecked>
                                                                <span class="form-check-label">Alamat Rumah</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-3 offset-4">
                                                                <input type="checkbox"
                                                                    class="form-check-input form-check-input" unchecked>
                                                                <span class="form-check-label">Lainnya</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Nama Alamat
                                                                Lainnya:</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Alamat Lainnya (Rumah Ortu, Toko, Dll.)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan<i
                                                            class="ph-check-circle ms-2"></i></button>
                                                    <button type="reset" class="btn btn-danger">Batal<i
                                                            class="ph-x-circle ms-2"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered datatable-save-state mt-2">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Nama Alamat</th>
                                                        <th>Detail Alamat</th>
                                                        <th>Alamat Utama</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>Alamat Offtaker</td>
                                                        <td>Alamat Detail-1</td>
                                                        <td>
                                                            <input type="checkbox" class="form-check-input"
                                                                id="cc_li_c">
                                                        </td>
                                                        <td>
                                                            <a class="badge bg-success" href="#"><i
                                                                    class="ph ph-pencil"></i><span
                                                                    class="d-none d-sm-inline-block"></span></a>
                                                            <a class="badge bg-danger" href="#"><i
                                                                    class="ph ph-x-circle"></i><span
                                                                    class="d-none d-sm-inline-block"></span></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="vertical-left-tab3">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mb-5">
                                    <h6>Rekening Offtaker</h6>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal_default_tab3"><i class="ph-plus-circle"></i><span
                                                class="d-none d-lg-inline-block ms-2">Tambah Rekening</span></button>
                                    </div>
                                    <div id="modal_default_tab3" class="modal fade " tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Rekening</h5>
                                                    {{-- <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button> --}}
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Kategori
                                                                Rekening:</label>
                                                            <div class="col-lg-7">
                                                                <div class="input-group">
                                                                    <select data-placeholder="Pilih Kategori Rekening"
                                                                        class="form-control select" data-width="1%">
                                                                        <option></option>
                                                                        <option value="1">Giro</option>
                                                                        <option value="2">Debit</option>
                                                                        <option value="3">Kredit</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Nama Bank:</label>
                                                            <div class="col-lg-7">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Pilih Nama Bank">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Nomor Rekening:</label>
                                                            <div class="col-lg-7">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Masukkan Nomor Rekening">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Nama Pemilik
                                                                Rekening:</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Masukkan Nama Pemilik Rekening">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Keterangan:</label>
                                                            <div class="col-lg-7">
                                                                <textarea rows="3" cols="3" class="form-control"
                                                                    placeholder="Masukkan Alamat Detail (Cth: Jalan, Nomor Rumah, Block, dll)"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan<i
                                                            class="ph-check-circle ms-2"></i></button>
                                                    <button type="reset" class="btn btn-danger">Batal<i
                                                            class="ph-x-circle ms-2"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered datatable-save-state mt-2">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Nama Rekening</th>
                                                        <th>Nomor Rekening</th>
                                                        <th>Nama Pemilik Rekening</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>Nama Rekening-1</td>
                                                        <td>XXXXXXXXXXXXXXXX</td>
                                                        <td>Nama Pemilik Rekening-1</td>
                                                        <td>
                                                            <a class="badge bg-success" href="#"><i
                                                                    class="ph ph-pencil"></i><span
                                                                    class="d-none d-sm-inline-block"></span></a>
                                                            <a class="badge bg-danger" href="#"><i
                                                                    class="ph ph-x-circle"></i><span
                                                                    class="d-none d-sm-inline-block"></span></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="vertical-left-tab4">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mb-5">
                                    <h6>Rincian Barang Offtaker</h6>
                                    <div class="d-flex justify-content-end">
                                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal_default_tab4"><i class="ph-plus-circle"></i><span
                                                class="d-none d-lg-inline-block ms-2">Tambah Barang</span></button> --}}
                                        <button type="button" class="btn btn-primary"><i
                                                class="ph-plus-circle"></i><span
                                                class="d-none d-lg-inline-block ms-2">Tambah Barang</span></button>
                                    </div>
                                    <div id="modal_default_tab4" class="modal fade " tabindex="-1">
                                        {{-- <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Rekening</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Kategori
                                                                Rekening:</label>
                                                            <div class="col-lg-7">
                                                                <div class="input-group">
                                                                    <select data-placeholder="Pilih Kategori Rekening"
                                                                        class="form-control select" data-width="1%">
                                                                        <option></option>
                                                                        <option value="1">Giro</option>
                                                                        <option value="2">Administratif</option>
                                                                        <option value="3">Koran</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Nama Bank:</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Pilih Nama Bank">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Nomor Rekening:</label>
                                                            <div class="col-lg-7">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Masukkan Nomor Rekening">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Nama Pemilik
                                                                Rekening:</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Masukkan Nama Pemilik Rekening">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Keterangan:</label>
                                                            <div class="col-lg-7">
                                                                <textarea rows="3" cols="3" class="form-control"
                                                                    placeholder="Masukkan Keterangan (Cth: Kantor Cabang, dll)"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan<i
                                                            class="ph-check-circle ms-2"></i></button>
                                                    <button type="reset" class="btn btn-danger">Batal<i
                                                            class="ph-x-circle ms-2"></i></button>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered datatable-save-state mt-2">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Nama Barang</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Kategori Barang</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>
                                                            <select data-placeholder="P17 - Plastik Kresek"
                                                                class="form-control select">
                                                                <option></option>
                                                                <option value="1">Giro</option>
                                                                <option value="2">Administratif</option>
                                                                <option value="3">Koran</option>
                                                            </select>
                                                        </td>
                                                        <td>Jenis Barang-1</td>
                                                        <td>Kategori Barang-1</td>
                                                        <td>
                                                            <a class="badge bg-success" href="#"><i
                                                                    class="ph ph-pencil"></i><span
                                                                    class="d-none d-sm-inline-block"></span></a>
                                                            <a class="badge bg-danger" href="#"><i
                                                                    class="ph ph-x-circle"></i><span
                                                                    class="d-none d-sm-inline-block"></span></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select data-placeholder="P22 - Styrofoam Bersih"
                                                                class="form-control select">
                                                                <option></option>
                                                                <option value="1">Giro</option>
                                                                <option value="2">Administratif</option>
                                                                <option value="3">Koran</option>
                                                            </select>
                                                        </td>
                                                        <td>Jenis Barang-1</td>
                                                        <td>Kategori Barang-1</td>
                                                        <td>
                                                            <a class="badge bg-success" href="#"><i
                                                                    class="ph ph-pencil"></i><span
                                                                    class="d-none d-sm-inline-block"></span></a>
                                                            <a class="badge bg-danger" href="#"><i
                                                                    class="ph ph-x-circle"></i><span
                                                                    class="d-none d-sm-inline-block"></span></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /basic layout -->
    <script src="{{ asset('admin_resources/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('admin_resources/assets/demo/pages/form_select2.js') }}"></script>
    <script src="{{ asset('admin_resources/assets/demo/pages/components_modals.js') }}"></script>

    {{-- <script src="{{ asset('admin_resources/demo/pages/form_layouts.js')}}"></script> --}}
@endsection
