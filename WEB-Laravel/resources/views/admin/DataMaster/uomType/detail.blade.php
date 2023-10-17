@extends('layouts.admin.template')

@section('content')
    <!-- Basic layout -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Detail Jenis Satuan Barang</h5>
        </div>
        <div class="card-body border-top">
            <form action="#">
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label fw-semibold">Jenis Satuan Barang:</label>
                    <div class="col-lg-9">
                        <label class="col-form-label">{{ $uomType['uomType'] }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label fw-semibold">Keterangan:</label>
                    <div class="col-lg-9">
                        <label class="col-form-label">{{ $uomType['description'] }}</label>
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ route('uomType.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
