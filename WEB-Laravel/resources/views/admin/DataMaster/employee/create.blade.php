@extends('layouts.admin.template')
@section('content')
    <!-- Basic layout -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Pegawai</h5>
        </div>
        <div class="container mt-3 mx-auto">
            <div class="row">
                <div class="d-lg-flex">
                    <ul class="nav nav-tabs nav-tabs-vertical nav-tabs-vertical-start wmin-lg-200 me-lg-3 mb-3 mb-lg-0">
                        <li class="nav-item">
                            <a href="#vertical-left-tab1" class="nav-link active" data-bs-toggle="tab">
                                {{-- <i class="ph-user-circle me-2"></i> --}}
                                Data Pribadi Pegawai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#vertical-left-tab2" class="nav-link" data-bs-toggle="tab">
                                {{-- <i class="ph-currency-circle-dollar me-2"></i> --}}
                                Alamat Pegawai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#vertical-left-tab3" class="nav-link" data-bs-toggle="tab">
                                {{-- <i class="ph-shopping-cart me-2"></i> --}}
                                Identitas Pegawai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#vertical-left-tab4" class="nav-link" data-bs-toggle="tab">
                                {{-- <i class="ph-shopping-cart me-2"></i> --}}
                                Data Kepegawaian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#vertical-left-tab5" class="nav-link" data-bs-toggle="tab">
                                {{-- <i class="ph-shopping-cart me-2"></i> --}}
                                Rekening Pegawai
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
                                <div class="row justify-content-center">
                                    <label class="col-lg-3 col-form-label">Nama Lengkap (Sesuai Identitas):</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap">
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Tempat, Tanggal Lahir:</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir">
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="ph-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control datepicker-autohide"
                                                placeholder="Tanggal Lahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Jenis Kelamin:</label>
                                    <div class="col-lg-7">
                                        <div class="form-check-horizontal">
                                            <label class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" unchecked>
                                                <span class="form-check-label">Laki-laki</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender">
                                                <span class="form-check-label">Perempuan</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Agama:</label>
                                    <div class="col-lg-7">
                                        <div class="input-group">
                                            <select data-placeholder="Pilih Agama" class="form-control select"
                                                data-width="1%">
                                                <option></option>
                                                <option value="1">Katolik</option>
                                                <option value="2">Katolik</option>
                                                <option value="3">Hindu</option>
                                            </select>
                                            <button type="button" class="btn btn-primary "><i
                                                    class="ph-plus-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Status Pernikahan:</label>
                                    <div class="col-lg-7">
                                        <div class="input-group">
                                            <select data-placeholder="Pilih Status" class="form-control select"
                                                data-width="1%">
                                                <option></option>
                                                <option value="1">Sudah Kawin</option>
                                                <option value="2">Belum Kawin</option>
                                                <option value="3">Cerai</option>
                                            </select>
                                            <button type="button" class="btn btn-primary "><i
                                                    class="ph-plus-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Kewarganegaraan:</label>
                                    <div class="col-lg-7">
                                        <div class="form-check-horizontal">
                                            <label class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kewarganegaraan"
                                                    unchecked>
                                                <span class="form-check-label">WNI</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kewarganegaraan">
                                                <span class="form-check-label">WNA</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label class="col-lg-3 col-form-label">Nomor Telepon:</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon">
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
                                    <label class="col-lg-3 col-form-label">Email:</label>
                                    <div class="col-lg-7">
                                        <input type="email" class="form-control" placeholder="Masukkan Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <style>
                                        .badge {
                                            border: none
                                        }
                                    </style>
                                    <div class="col-md-11 text-end mb-5">
                                        <button type="submit" class="badge bg-primary">Simpan<i
                                                class="ph-check-circle"></i></button>
                                        <button type="reset" class="badge bg-danger">Batal<i
                                                class="ph-x-circle"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="vertical-left-tab2">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mb-5">
                                    <h6>Alamat Pegawai</h6>
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
                                                                <span class="form-check-label">Alamat di KTP</span>
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
                                                                <span class="form-check-label">Alamat Kantor</span>
                                                            </div>
                                                            <div class="col-lg-3">
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
                                    {{-- <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div> --}}
                                    <style>
                                        .table-responsive {
                                            padding-top: 10px
                                        }

                                        @media screen and (max-width:768px) {
                                            .table-responsive a {
                                                display: inline-block;
                                                margin: 5px;
                                            }
                                        }
                                    </style>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
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
                                                        <input type="checkbox" class="form-check-input" id="cc_li_c">
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
                        <div class="tab-pane fade" id="vertical-left-tab3">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mb-5">
                                    <h6>Identitas Pegawai</h6>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal_default_tab3"><i class="ph-plus-circle"></i><span
                                                class="d-none d-lg-inline-block ms-2">Tambah Identitas</span></button>
                                    </div>
                                    <div id="modal_default_tab3" class="modal fade " tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Identitas</h5>
                                                    {{-- <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button> --}}
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Jenis Kartu
                                                                Identitas:</label>
                                                            <div class="col-lg-7">
                                                                <div class="input-group">
                                                                    <select id="jenisKartuIdentitas"
                                                                        data-placeholder="Pilih Jenis Kartu Identitas"
                                                                        class="form-control select" data-width="1%">
                                                                        <option></option>
                                                                        <option value="1">KTP</option>
                                                                        <option value="2">SIM</option>
                                                                        <option value="3">SKCK</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Nomor Kartu
                                                                Identitas:</label>
                                                            <div class="col-lg-7">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Masukkan Nomor Kartu Identitas">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label class="col-lg-4 col-form-label">Tanggal
                                                                Kadaluarsa:</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Masukkan Tanggal Kadaluarsa">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-lg-4 col-form-label">Gambar Kartu
                                                                Identitas:</label>
                                                            <div class="col-lg-7">
                                                                <img id="preview" src="#" alt="Preview"
                                                                    style="display: none; max-width: 200px; max-height: 200px;">
                                                                <input type="file" class="form-control"
                                                                    name="company_logo" id="company_logo"
                                                                    {{-- onchange="previewImage(this);" --}}>
                                                                <div class="form-text text-muted">Format File: (*.jpg,
                                                                    *.jpeg, *.png) (Max 2MB)
                                                                </div>
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
                                    {{-- <div class="row"> --}}
                                    {{-- <div class="col-lg-12"> --}}
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Jenis Identitas</th>
                                                    <th>Nomor Identitas</th>
                                                    <th>Expire Data</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>Jenis Identitas-1</td>
                                                    <td>XXXXXXXXXXXXXXXX</td>
                                                    <td>XX/XX/XXXX</td>
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
                                    {{-- </div> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="vertical-left-tab4">
                            <div class="row justify-content-center">
                                <div class="col md-10 mb-5">
                                    <div class="col-md-3 mb-4 offset-1">
                                        <h6>Data Kepegawaian</h6>
                                    </div>
                                    <form action="#">
                                        <div class="row mb-3 justify-content-center">
                                            <label class="col-lg-3 col-form-label">NIP:</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" placeholder="Masukkan NIP">
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label class="col-lg-3 col-form-label">Status Pegawai:</label>
                                            <div class="col-lg-7">
                                                <div class="input-group">
                                                    <select data-placeholder="Pilih Status" class="form-control select"
                                                        data-width="1%">
                                                        <option></option>
                                                        <option value="1">Aktif</option>
                                                        <option value="2">Cuti</option>
                                                        <option value="3">Dipecat</option>
                                                    </select>
                                                    <button type="button" class="btn btn-primary "><i
                                                            class="ph-plus-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label class="col-lg-3 col-form-label">Departemen:</label>
                                            <div class="col-lg-7">
                                                <div class="input-group">
                                                    <select data-placeholder="Pilih Departemen"
                                                        class="form-control select" data-width="1%">
                                                        <option></option>
                                                        <option value="1">IT</option>
                                                        <option value="2">Manajemen</option>
                                                        <option value="3">Keamanan</option>
                                                    </select>
                                                    <button type="button" class="btn btn-primary "><i
                                                            class="ph-plus-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label class="col-lg-3 col-form-label">Unit:</label>
                                            <div class="col-lg-7">
                                                <div class="input-group">
                                                    <select data-placeholder="Pilih Unit" class="form-control select"
                                                        data-width="1%">
                                                        <option></option>
                                                        <option value="1">IT</option>
                                                        <option value="2">Manajemen</option>
                                                        <option value="3">Keamanan</option>
                                                    </select>
                                                    <button type="button" class="btn btn-primary "><i
                                                            class="ph-plus-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label class="col-lg-3 col-form-label">Jabatan:</label>
                                            <div class="col-lg-7">
                                                <div class="input-group">
                                                    <select data-placeholder="Pilih Jabatan" class="form-control select"
                                                        data-width="1%">
                                                        <option></option>
                                                        <option value="1">CEO</option>
                                                        <option value="2">CTO</option>
                                                        <option value="3">HEad Officer</option>
                                                    </select>
                                                    <button type="button" class="btn btn-primary "><i
                                                            class="ph-plus-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label class="col-lg-3 col-form-label">Foto Pegawai:</label>
                                            <div class="col-lg-7">
                                                <img id="preview" src="#" alt="Preview"
                                                    style="display: none; max-width: 200px; max-height: 200px;">
                                                <input type="file" class="form-control" name="company_logo"
                                                    id="company_logo" onchange="previewImage(this);">
                                                <div class="form-text text-muted">Format File: (*.jpg,
                                                    *.jpeg, *.png) (Max 2MB)
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="vertical-left-tab5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mb-5">
                                    <h6>Rekening Pegawai</h6>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal_default_tab5"><i class="ph-plus-circle"></i><span
                                                class="d-none d-lg-inline-block ms-2">Tambah Barang</span></button>
                                    </div>
                                    <div id="modal_default_tab5" class="modal fade " tabindex="-1">
                                        <div class="modal-dialog">
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
                                        </div>
                                    </div>
                                    {{-- <div class="row"> --}}
                                    {{-- <div class="col-lg-12"> --}}
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Nama Rekening</th>
                                                    <th>Nomor Rekening</th>
                                                    <th>Nama Pemilik Rekneing</th>
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
                                    {{-- </div> --}}
                                    {{-- </div> --}}
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
    <script src="{{ asset('admin_resources/assets/demo/pages/form_select2.js') }}"></script>
    <script src="{{ asset('admin_resources/assets/demo/pages/components_modals.js') }}"></script> --}}

    <script>
        function clearModalContent() {
            var selectElement = document.querySelector('#modal_default_tab3 select');
            selectElement.selectedIndex = 0; // Resets the select element
            var selectElement = document.getElementById('jenisKartuIdentitas');
            selectElement.selectedIndex = 0; // Reset the select element

            var inputElements = document.querySelectorAll(
                '#modal_default_tab3 input:not([type="submit"]):not([type="reset"])');
            inputElements.forEach(function(input) {
                if (input.type === 'file') {
                    input.value = ''; // Resets the file input
                    document.getElementById('preview').style.display = 'none'; // Hide the preview image
                } else {
                    input.value = ''; // Resets other input elements
                }
            });
        }

        document.querySelector('#modal_default_tab3 .btn-danger').addEventListener('click', clearModalContent);

        document.addEventListener('click', function(event) {
            var modal = document.getElementById('modal_default_tab3');
            var isClickInsideModal = modal.contains(event.target);

            if (!isClickInsideModal && window.getComputedStyle(modal).display !== 'none') {
                clearModalContent();
            }
        });
    </script>
    {{-- <script src="{{ asset('admin_resources/demo/pages/form_layouts.js')}}"></script> --}}
@endsection
