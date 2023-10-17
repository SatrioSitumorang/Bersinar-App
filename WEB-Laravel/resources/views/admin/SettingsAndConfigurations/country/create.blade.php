@extends('layouts.admin.template')

@section('content')
<!-- Basic layout -->
<div class="card">
						<div class="card-header">
							<h5 class="mb-0">Daftar Perusahaan/Institusi</h5>
						</div>

						<div class="card-body border-top">
                        <div class="row">
							<div class="col-lg-9 offset-lg-1">
							<form action="#">
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Kode Perusahaan/Institusi :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Nama Perusahaan/Institusi :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Nomor NP/WP :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Negara :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Provinsi :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Kota/Kabupaten :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Kecamatan :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Alamat :</label>
									<div class="col-lg-9">
										<textarea rows="3" cols="3" class="form-control" placeholder="Masukkan Keterangan"></textarea>
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Kode Pos :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Nomor Telepon :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Nomor Faximile :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Nomor WhatsApp :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Email :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Logo Perusahaan :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label">Mata Uang :</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran">
									</div>
								</div>
								<div class="text-end">
									<button type="submit" class="btn btn-primary">Simpan<i class="ph-check-circle ms-2"></i></button>
                                    <button type="reset" class="btn btn-danger">Batal<i class="ph-x-circle ms-2"></i></button>
								</div>
							</form>
						</div>
</div>
</div>
					</div>
					<!-- /basic layout -->
@endsection