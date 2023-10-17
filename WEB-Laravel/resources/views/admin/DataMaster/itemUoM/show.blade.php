@extends('layouts.admin.template')

@section('content')
<!-- Basic layout -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Detail Kategori Barang</h5>
    </div>

    <div class="card-body border-top">
        <div class="row">
            <div class="card-body">
                <form action="#">
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label fw-semibold">Jenis Satuan Barang :</label>
                        <div class="col-lg-9">
                            <label class="col-lg-9 col-form-label">
                                {{ $itemuom->uomType ? $itemuom->uomType : 'Jenis Barang Tidak Ditemukan' }}
                            </label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label fw-semibold">Kategori Barang:</label>
                        <div class="col-lg-9">
                            <label class="col-lg-9 col-form-label">
                                {{ $itemuom->uomItem }}
                            </label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label fw-semibold">Keterangan:</label>
                        <div class="col-lg-9">
                            <label class="col-lg-9 col-form-label">
                                {{ $itemuom->description }}
                            </label>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('itemUoM.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /basic layout -->
@endsection
