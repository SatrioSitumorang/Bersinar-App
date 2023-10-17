@extends('layouts.admin.template')

@section('content')
<!-- Basic layout -->
<div class="card">
	<div class="card-header">
		<h5 class="mb-0">Detail Kategori Rekening</h5>
	</div>

	<div class="card-body border-top">
    <div class="row">
							<div class="card-body">
							<form action="#">
								<div class="row mb-3">
									<label class="col-lg-3 col-form-label fw-semibold">Kategori Rekening :</label>
									<label class="col-lg-9 col-form-label">Kategori Rekening :</label>
								</div>

								<div class="row mb-3">
									<label class="col-lg-3 col-form-label fw-semibold">Keterangan:</label>
									<div class="col-lg-9">
                                    <label class="col-lg-9 col-form-label">Unpleasant nor diminution excellence apartments imprudence the met new. Draw part them he an to he roof only. Music leave say doors him. Tore bred form if sigh case as do. Staying he no looking if do opinion. Sentiments way understood end partiality and his.</label>
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
					<!-- /basic layout -->
@endsection