@extends('layouts.admin.template')

@section('content')
    <!-- Basic layout -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Unit Bisnis</h5>
        </div>

        <div class="card-body border-top">
            <div class="row ">
                <div class="col-lg-9 offset-lg-2">
                    <form action="#">
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Jenis Unit Bisnis:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Pilih Jenis Unit Bisnis">
                            </div>

                            <div class="col-lg-1">
                                <a class="btn btn-primary" href="{{route('businessUnit.create')}}"><i class="ph-plus-circle"></i><span
                                        class="d-none d-lg-inline-block"></span></a>
                            </div>


                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Kode Unit Bisnis:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Masukkan Kode Unit Bisnis">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Nama Unit Bisnis:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Masukkan Nama Unit Bisnis">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Nomor NPWP:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Masukkan Nomor NPWP">
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Negara:</label>
                            <div class="col-lg-9">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Negara</option>
                                    <option value="1">Indonesia</option>
                                    {{-- <option value="2">Inggris</option>
                                    <option value="3">Venezuela</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Provinsi:</label>
                            <div class="col-lg-9">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Provinsi</option>
                                    <option value="1">Sumatera Utara</option>
                                    <option value="2">DKI Jakarta</option>
                                    <option value="3">Sulawesi Barat</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Kota/Kabupaten:</label>
                            <div class="col-lg-9">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Kota/Kabupaten</option>
                                    <option value="1">Toba</option>
                                    <option value="2">Pematang Siantar</option>
                                    <option value="3">Samosir</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Kecamatan:</label>
                            <div class="col-lg-9">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Kecamatan</option>
                                    <option value="1">Sigumpar Barat</option>
                                    <option value="2">Balige</option>
                                    <option value="3">Laguboti</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Alamat:</label>
                            <div class="col-lg-9">
                                <textarea rows="3" cols="3" class="form-control" placeholder="Masukkan Alamat"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Kode Pos:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Kode Pos">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Nomor Telepon:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon Kantor">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Nomor Faximile:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Masukkan Nomor Faximile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Nomor WhatsApp:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Masukkan Nomor WhatsApp Perusahaan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Email:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Masukkan Email Perusahaan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Logo Perusahaan:</label>
                            <div class="col-lg-9">
                                <img id="preview" src="#" alt="Preview"
                                    style="display: none; max-width: 200px; max-height: 200px;">
                                <input type="file" name="company_logo" id="company_logo"
                                    onchange="previewImage(this);" style="padding-top: 10px">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Mata Uang:</label>
                            <div class="col-lg-9">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Mata Uang</option>
                                    <option value="1">Dollar AS</option>
                                    <option value="2">Yen</option>
                                    <option value="3">Rupiah</option>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <a class="btn btn-primary" href="#"><i class="ph-plus-circle"></i><span
                                        class="d-none d-lg-inline-block"></span></a>
                            </div>



                            {{-- <div class="colms-auto">

                            </div> --}}
                        </div>



                        <div class="row">
                            <div class="col-md-11 text-end">
                                <button type="submit" class="btn btn-primary">Simpan<i
                                        class="ph-check-circle ms-2"></i></button>
                                <button type="reset" class="btn btn-danger">Batal<i class="ph-x-circle ms-2"></i></button>
                            </div>
                        </div>



                        {{-- <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan<i
                                    class="ph-check-circle ms-2"></i></button>
                            <button type="reset" class="btn btn-danger">Batal<i class="ph-x-circle ms-2"></i></button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        }
    </script>


    <!-- /basic layout -->
@endsection
