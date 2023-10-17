@extends('layouts.admin.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Jenis Unit Bisnis</h5>
    </div>
    <div class="card-body border-top">
        <div class="col-lg-9 offset-lg-1">
            <form action="{{ route('businessUnitTypes.update', ['id' => $businessUnitTypeData['sbuTypeId']]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">Nama Jenis Unit Bisnis:</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Masukkan Jenis Unit Bisnis" required
                            name="businessUnitType" value="{{ $businessUnitTypeData['businessUnitType'] }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">Keterangan:</label>
                    <div class="col-lg-9">
                        <textarea rows="3" cols="3" class="form-control" placeholder="Masukkan Keterangan" required
                            name="description">{{ $businessUnitTypeData['description'] }}</textarea>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan<i class="ph-check-circle ms-2"></i></button>
                    <a href="{{ route('businessUnitTypes.index') }}" class="btn btn-danger">Batal<i
                            class="ph-x-circle ms-2"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
